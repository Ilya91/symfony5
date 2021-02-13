import React, { Component } from 'react';
import { render } from 'react-dom';

class HelloMessage extends Component {
    render() {
        return (
            <div>
                Привет, {this.props.name}
            </div>
        );
    }
}

render(
    <HelloMessage name="Саша" />,
    document.getElementById('root')
);
