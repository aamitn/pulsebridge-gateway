## PulseBridge Gateway Server
[![buddy pipeline](https://app.buddy.works/amitnandileo-2/pulsebridge-gateway/pipelines/pipeline/485432/badge.svg?token=fb16d4ceb25aaee899aeebeb8f9d57239dd800defc2afb65a0176c36d32bd464 "buddy pipeline")](https://app.buddy.works/amitnandileo-2/pulsebridge-gateway/pipelines/pipeline/485432)

Welcome to the PulseBridge Gateway Server repository! This server acts as an SMS Gateway powered by the PulseBridge library.The PulseBridge Gateway Server is a powerful SMS Gateway software that allows you to send SMS messages seamlessly. Whether you're looking to integrate SMS functionality into your web applications or send messages from a centralized server, PulseBridge Gateway makes the process efficient and straightforward.


Source for Mobile Client App here : [PulseBridge App](https://github.com/aamitn/pulsebridge-app)

## Table of Contents

*   [Getting Started](#getting-started)
*   [Building and Running Locally](#building-and-running-locally)
*   [Running with Docker Compose](#running-with-docker-compose)
*   [Manually Spinning Up Your Own Image](#manually-spinning-up-your-own-image)
*   [Licecnse](#license)
*   [Contribution](#contribution)

## Getting Started

Follow these three simple steps to get started with PulseBridge Gateway:

1.  **Run PulseBridge Gateway Server App and click `setup credentials` button.**  
    Clone the repository, install dependencies, and run the server locally or using Docker Compose using the below instructions.[Building and Running Locally](#building-and-running-locally)
2.  [**Download**](https://app.download#) **PulseBridge Mobile App and set the URL in app provided by the server.**
3.  **Send SMS from the Server Frontend or API**

    With the PulseBridge Gateway Server running, access the user-friendly interface at [http://localhost](http://localhost/) to send SMS messages. Alternatively, integrate the SMS functionality into your applications using the provided API.


## Building and Running Locally

1.  **Clone the Repository:**

    ```bash
    git clone https://github.com/aamitn/pulsebridge-gateway.git
    cd pulsebridge-gateway  
    ```

2.  **Change Ownership:**

    ```bash
    sudo chown -R www-data:www-data /path/to/pulsebridge-gateway/
    ```


3.  **Install Dependencies:**  
    `*install composer from instructions here :` [`Composer (getcomposer.org)`](https://getcomposer.org/download/)

    ```bash
    composer install
    ```

4.  **Run the Server: \[run the dev server or copy the directory contents to web server of your choice\]**

    ```bash
    php -S localhost:8000 -t public
    ```


## Running with Docker Compose

*   run command from the project root directory

1.  **Run the Container:**

    ```plaintext
    docker-compose up -d
    ```


## Build your own docker image

1.  **Build the Docker Image::**

    ```plaintext
     docker build -t pulsebridge-gateway .
    ```

2.  **Run the Docker Container:**

    ```plaintext
    docker run -p 80:80 --name pulsebridge-gateway pulsebridge-gateway
    ```


## **License**

This project is licensed under the [MIT License](https://chat.openai.com/c/LICENSE).  
 

## **Contributions**

Contributions are welcome! If you'd like to contribute to PulseBridge Gateway, please follow our [Contribution Guidelines](https://chat.openai.com/c/CONTRIBUTING.md).  
Fork the repository and create your branch:

1.  ```bash
    git clone https://github.com/aamitn/pulsebridge-gateway.git cd pulsebridge-gateway git checkout -b feature/your-feature
    ```
2.  Make your changes and commit them:

    ```bash
    git add . git commit -m "Add your feature"
    ```
4.  Push to your fork and submit a pull request.
5.  Follow the code review process.
6.  Your contribution will be merged once approved.
