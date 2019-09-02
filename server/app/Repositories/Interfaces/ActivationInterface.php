<?php

namespace App\Repositories\Interfaces;

use App\Models\Member;

interface ActivationInterface {

    /**
     * Create a new activation record and code.
     *
     * @param  App\Models\Member $member
     * @return App\Models\Activation
     */
    public function createActivation(Member $member);

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  App\Models\Member $member
     * @param  string $code
     * @return App\Models\Activation|bool
     */
    public function exists(Member $member, $code = null);

    /**
     * Completes the activation for the given user.
     *
     * @param  App\Models\Member $member
     * @param  string $code
     * @return bool
     */
    public function complete(Member $member, $code);

    /**
     * Checks if a valid activation has been completed.
     *
     * @param  App\Models\Member $member
     * @return App\Models\Activation|bool
     */
    public function completed(Member $member);

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  App\Models\Member $member
     * @return bool|null
     */
    public function remove(Member $member);

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired();

}
