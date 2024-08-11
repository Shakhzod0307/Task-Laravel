import React, { useState } from 'react';

function LoginForm() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [errorMessage, setErrorMessage] = useState(null);

  const handleSubmit = (event) => {
    event.preventDefault();

    // Perform login logic here (e.g., call an API endpoint)
    // You can use the email and password state variables
    // to send the login credentials.

    // Replace with your actual login logic and error handling
    fetch('/api/login', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email, password }),
    })
      .then((response) => {
        if (response.ok) {
          // Login successful, handle success state (redirect, etc.)
          alert('Login successful!'); // Replace with your desired success handling
        } else {
          setErrorMessage('Invalid email or password'); // Set error message
        }
      })
      .catch((error) => {
        console.error('Login error:', error);
        setErrorMessage('An error occurred. Please try again.'); // Generic error message
      });
  };

  return (
    <form onSubmit={handleSubmit}>
      {errorMessage && <p className="error-message">{errorMessage}</p>}
      <div className="form-group">
        <label htmlFor="email">Email address</label>
        <input
          type="email"
          className="form-control"
          id="email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          required
        />
      </div>
      <div className="form-group">
        <label htmlFor="password">Password</label>
        <input
          type="password"
          className="form-control"
          id="password"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          required
        />
      </div>
      <button type="submit" className="btn btn-primary">
        Login
      </button>
    </form>
  );
}

export default LoginForm;

