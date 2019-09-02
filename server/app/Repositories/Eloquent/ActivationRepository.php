<?php

namespace App\Repositories\Eloquent;

use App\Models\Member;
use App\Repositories\Eloquent\RepositoriesAbstract;
use App\Repositories\Interfaces\ActivationInterface;

class ActivationRepository extends RepositoriesAbstract implements ActivationInterface {

    /**
     * The activation expiration time, in seconds.
     *
     * @var int
     */
    protected $expires = 3 * 24 * 60 * 60;

    /**
     * {@inheritDoc}
     */
    public function createActivation(Member $member) {
        $activation = $this->model;
        $code = $this->generateActivationCode();
        $activation->fill(compact('code'));
        $activation->member_id = $member->getKey();
        $activation->save();
        return $activation;
    }

    /**
     * {@inheritDoc}
     */
    public function exists(Member $member, $code = null) {
        $expires = $this->expires();
        $activation = $this->model
            ->newQuery()
            ->where('member_id', $member->getKey())
            ->where('completed', false)
            ->where('created_at', '>', $expires);
        if ($code) {
            $activation->where('code', $code);
        }
        return $activation->first() ?: false;
    }

    /**
     * {@inheritDoc}
     */
    public function complete(Member $member, $code) {
        $expires = $this->expires();
        $activation = $this->model->newQuery()
            ->where('member_id', $member->getKey())
            ->where('code', $code)
            ->where('completed', false)
            ->where('created_at', '>', $expires)
            ->first();
        if ($activation === null) {
            return false;
        }
        $activation->fill([
            'completed' => true,
            'completed_at' => now(config('app.timezone')),
        ]);
        $activation->save();
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function completed(Member $member) {
        $activation = $this->model->newQuery()
            ->where('member_id', $member->getKey())
            ->where('completed', true)
            ->first();
        return $activation ?: false;
    }

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    public function remove(Member $member) {
        $activation = $this->completed($member);
        if ($activation === false) {
            return false;
        }
        return $activation->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function removeExpired() {
        $expires = $this->expires();
        return $this->model->newQuery()
            ->where('completed', false)
            ->where('created_at', '<', $expires)
            ->delete();
    }

    /**
     * Returns the expiration date.
     * @return \Carbon\Carbon
     */
    protected function expires() {
        return now(config('app.timezone'))->subSeconds($this->expires);
    }

    /**
     * Return a random string for an activation code.
     *
     * @return string
     */
    protected function generateActivationCode() {
        return \sha1(time());
    }
}
