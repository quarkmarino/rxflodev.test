<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/quarkmarino/rxflodev.test">
    <img src="logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Upload and Display Images Back-End and Front-End</h3>

  <p align="center">
    A website that allows the user to upload images to a remote storage service.
    <br />
    <a href="https://github.com/quarkmarino/rxflodev.test">View Demo</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

<!-- [![Product Name Screen Shot][screenshot]](screenshot.png) -->

#### Front-End

Your task is to create a web page that allows users to upload images and then display them to the user. You will be uploading the images to a remote image hosting service. The end-point for the service is:

```
https://test.rxflodev.com/uploads/index.php
```

After receiving an image successfully the image service will return a json encoded result in the following format:

```json
{"status":"success","message":"Image saved successfully.","url":"https://test.rxflodev.com/uploads/images/55c4d2369010c.png"}
```

#### Back-End

Your task is to create a web page that allows users to upload images and then display them to the user. However because space is limited on your web server you will need to store the images in a remote image hosting service. The end-point for the service is:

```
https://test.rxflodev.com
```

The image must be base64 encoded and posted to the end-point in the following format:

```
imageData=base64-encoded-image-data
```

After receiving an image successfully the image service will return a json encoded result in the following format:
```json
{"status":"success","message":"Image saved successfully.","url":"https://test.rxflodev.com/image-store/55c4d2369010c.png"}
```

### Requirements and Specifications

#### Front-End

The image must then be displayed on the web page using the url from the result.

* The most recent uploaded image should be displayed first.
* Uploaded images must be in png format.
* The user should be able to upload multiple images.
* A pure ajax solution is preferred (ie no page refresh).
* Progress bar and other user feedback such as error / success feedback are a plus.

#### Back-End

The image must then be displayed on the web page using the url from the result.

* Create an API endpoint on the backend to transfer the image to storage service.
* Images must be stored in the remote image service, not on your web server.
* The most recent image should be displayed first.
* Images must be in png format.
* For simplicity you may use the session for long term storage.

### Built With

* [Laravel](https://laravel.com/)
* [Livewire](https://laravel-livewire.com)
* [Tailwind](https://tailwindcss.com)

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

Install composer dependencies via [Composer](https://getcomposer.com)

* Composer

  ```sh
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
  ```
* Install docker and docker-compose
  * [Docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04)
  * [Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04)


### Installation

1. Clone the repo
   ```sh
   git clone git@github.com:quarkmarino/rxflodev.test.git
   ```
2. Install Composer dependencies
   ```sh
   cd rxflodev.test
   composer install
   ```
3. Start the Sail docker containers
   ```sh
   ./vendor/bin/sail up -d
   ```
4. Visit the running server
    * open [localhost](http://localhost)

<!-- TESTING -->
## Testing

For testing, open the terminal go to the project path and run the following command
```sh
./vendor/bin/sail art test
```


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Jose Mariano Escalera Sierra - [@quarkmarino](https://twitter.com/quarkmarino) - quarkmarino@gmail.com

Project Link: [https://github.com/quarkmarino/rxflodev.test](https://github.com/quarkmarino/rxflodev.test)