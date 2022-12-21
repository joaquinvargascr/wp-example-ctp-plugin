# wp-example-ctp-plugin

This project aims to demonstrate how to create an object-oriented WordPress plugin in PHP. In order to run the project, it is necessary to have Docker Machine installed on the local machine. The plugin will use object-oriented programming techniques in order to organize and structure the code in a more efficient and maintainable way. By using Docker Machine, it will be possible to easily set up a development environment for testing and debugging the plugin. Overall, this project should provide a useful guide for anyone looking to create a custom WordPress plugin using object-oriented PHP.

### Steps

To follow these instructions and set up the project on your local machine, you will need to have Docker installed. Here are the steps to set up the project:

- Download the repository to your local machine.
- Open a terminal window and navigate to the project folder.
- Run the command docker-compose up. This will start the necessary Docker containers and set up the development environment.
- Wait for about 10 seconds for the database to be restored.
- Open a web browser and go to the following address: http://localhost:8080/wp-login.php
- Use the username "admin" and the password "admin123" to log in to the WordPress admin dashboard.

Once you have followed these steps, you should be able to access the WordPress admin dashboard and start working on the project. If you have any issues setting up the project, you may want to double-check that you have Docker installed and running correctly on your machine.

## Rest API

To view an example of a WordPress REST API, you can use the following URL: http://localhost:8080/wp-json/wp/v2/example_cpt

This URL will allow you to access a custom post type called "example_cpt" through the WordPress REST API. You can use a tool like Postman or Curl to make HTTP requests to this endpoint and retrieve data from the custom post type.

Keep in mind that in order for this to work, the custom post type "example_cpt" must be registered and active on your WordPress site. You can do this by adding the necessary code to your plugin or theme.

The WordPress REST API allows you to access and manipulate data on your WordPress site programmatically, using HTTP requests. It is a powerful tool that can be used to build custom integrations and applications with WordPress.