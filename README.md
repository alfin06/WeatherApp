<h1>WeatherApp Documentation</h1>

<p>Welcome to the official documentation for the WeatherApp. This documentation provides a comprehensive guide on how to set up, use, and contribute to the project.</p>

<h2>Table of Contents</h2>

<ol>
  <li><a href="#introduction">Introduction</a></li>
  <li><a href="#getting-started">Getting Started</a>
    <ul>
      <li><a href="#prerequisites">Prerequisites</a></li>
      <li><a href="#installation">Installation</a></li>
    </ul>
  </li>
  <li><a href="#weather-app">Weather App</a>
    <ul>
      <li><a href="#user-interface">User Interface</a></li>
      <li><a href="#api-integration">API Integration</a></li>
    </ul>
  </li>
  <li><a href="#dockerization">Dockerization</a>
    <ul>
      <li><a href="#dockerfile">Dockerfile</a></li>
      <li><a href="#docker-composeyml">docker-compose.yml</a></li>
    </ul>
  </li>
  <li><a href="#continuous-integrationcontinuous-deployment-cicd">Continuous Integration/Continuous Deployment (CI/CD)</a>
    <ul>
      <li><a href="#github-actions-workflow">GitHub Actions Workflow</a></li>
      <li><a href="#environment-variables">Environment Variables</a></li>
    </ul>
  </li>
  <li><a href="#contributing">Contributing</a></li>
  <li><a href="#license">License</a></li>
</ol>

<h2>Introduction</h2>

<p>WeatherApp is a weather app built using Laravel that allows users to retrieve weather information for specific locations. This documentation aims to provide a clear understanding of the project's structure, setup, and usage.</p>

<h2>Getting Started</h2>

<h3>Prerequisites</h3>

<p>Before you begin, ensure you have the following software installed:</p>

<ul>
  <li><a href="https://getcomposer.org/download/">Composer</a></li>
  <li><a href="https://www.docker.com/get-started">Docker</a></li>
</ul>

<h3>Installation</h3>

<ol>
  <li>Clone the repository:
    <pre><code>git clone https://github.com/your-username/your-project.git
    cd your-project</code></pre>
  </li>
  <li>Install Laravel dependencies:
    <pre><code>composer install</code></pre>
  </li>
  <li>Set up your OpenWeatherMap API key in the <code>.env</code> file:
    <pre><code>OPENWEATHERMAP_API_KEY=your-api-key</code></pre>
  </li>
  <li>Start the Docker containers:
    <pre><code>docker-compose up -d</code></pre>
    Visit <a href="http://localhost:8000">http://localhost:8000</a> in your browser to access the app.
  </li>
</ol>
