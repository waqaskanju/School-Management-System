
# Introduction

> This project is a school managment system. It is implemented in Govt Higher Secondary School Chitor Swat KPK. It has the following features...
> Student Add/Edit/Delete.
> Exam marks Add/Edit/Print DMC
> Exam Roll No Slip, Award List generation.
> Login system/ Locking mechanism.
> Time Table of classes and vacant can be generated.


## Built With

- HTML5
- CSS3
- Javascript Vanilla
- Bootstrap 5
- MySQL
- PHP 8.2
- Ajax


## Live Demo

> Coming soon.

## Getting Started

To get a local copy up and running follow these sample steps.

- A text editor(preferably Visual Studio Code). For making changes in code. [Download Visual Studion Code](https://code.visualstudio.com/)
- A Server to host file. We need Php, Apache and mysql Stack (Preferably Wamp Server)    [Download Wamp Server](https://www.wampserver.com/en/#download-wrapper)
- For Group Development. A version contoling software (Preferably Git)  [Download Git](https://git-scm.com/downloads)

## Installation
- Put the 'Chitor-CMS' folder inside your 'WWW' Directory in WampServer Installtion folder.
- Or in the htdocs folder in case of XAMPP Software.
- Open mysql and import the database. the database file is available inside Database Folder.
- To install the file listed in Composer.json file. type inside cmd
$ php composer.phar update
- Or manually the following items should be installed for better code quality.
- Code Sniffer (PHP Linter) inside cmd when composer is installed.Type the following to install.
$ composer global require "squizlabs/php_codesniffer=*"

### Usage
Free to use for your work

#### Clone this repository

```bash

$ git clone https://github.com/waqaskanju/Chitor-LMS.git

$ cd Chitor-LMS

```

### To fix linter errors

$ phpcbf [filename]

### To find linter error

$ phpcs [filename]

For Real time error linter error show install "shevaua.phpcs" extension in VS Code.

#### To Ignore a folder in checking linter errors. In this case test folder.
$ phpcs --ignore=*/test

## Author

👤 **Waqas Ahmad**

- GitHub: [@waqaskanju](https://github.com/waqaskanju)
- Twitter: [@waqaskanju](https://twitter.com/waqaskanju)
- LinkedIn: [@waqaskanju](https://www.linkedin.com/in/waqaskanju)


## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

Feel free to check the [issues page](../../issues/).

## Show your support

Give a ⭐️ if you like this project!


## 📝 License

This project is [MIT](./MIT.md) licensed.
