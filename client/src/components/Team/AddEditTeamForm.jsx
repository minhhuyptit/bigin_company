import React, { Component } from 'react';
import { Form, Input, TextArea, Dropdown} from 'semantic-ui-react';

class AddEditTeamForm extends Component {
    constructor(props) {
        super(props);
        this.state = {
            form: this.props.infoTeam === undefined ? {
                name: '',
                leader: '',
                description: ''
            } : this.props.infoTeam
        }
    }

    handleChange(value, key) {
        let { form } = this.state
        form[key] = value
        this.setState({
            form
        });
    }

    render() {
        let { form } = this.state;
        return (
            <Form className='add-form'>
                <Form.Field
                    label="Name"
                    control={Input}
                    placeholder="Bigin Team"
                    required
                    value={form.name}
                    onChange={(e, { value }) => { this.handleChange(value, 'name') }}
                />
                <Form.Field>
                    <label>Leader</label>
                    <Dropdown
                        label='Leader' placeholder='Select Member'
                        fluid search
                        value={form.name}
                        selection
                        onChange={(e, { value }) => { this.handleChange(value, 'leader') }}
                        value={this.state.form.leader}
                        options={this.props.listMember}
                    />
                </Form.Field>
                <Form.Field>
                    <label>Description</label>
                    <TextArea
                        className='textarea-form'
                        placeholder='We are number 2, no one is number 1'
                        value={form.description}
                        onChange={(e, { value }) => { this.handleChange(value, 'description') }}
                    />
                </Form.Field>
            </Form>
        )
    }
}

export default AddEditTeamForm