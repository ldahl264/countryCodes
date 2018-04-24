import React from 'https://unpkg.com/react@16/umd/react.production.min.js';
import ReactDOM from 'https://unpkg.com/react-dom@16/umd/react-dom.production.min.js';

class TestResults extends React.Component {
  render() {
    return (
      <div>
        <ul>
          <li>One</li>
          <li>Two</li>
        </ul>
      </div>
    )
  }
}

ReactDOM.render(
  <TestResults />,
  document.getElementById('results')
);
