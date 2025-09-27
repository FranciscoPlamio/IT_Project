# IT Project

## Create database in mongodb

1. PHP extension mongodb must be installed to use mongodb. Before downloading please check the extension that will be download matches the php version and if it is Thread Safe(TS) or Not Thread Safe(NTS).
2. Check PHP Version - Open cmd or VS code terminal or any terminal and run this command to check php version: php -v
3. Check if its TS or NTS - Run this command: php -i | findstr "Thread"

- If Thread Safety => enabled → download TS
- If Thread Safety => disabled → download NTS

4. Download the extension on this site: https://pecl.php.net/package/mongodb/1.21.1/windows
5. After downloading extract it then copy or cut then paste the php_mongodb.dll into the php/ext folder where php is installed.
6. Modify the php.ini by adding this line extension=php_mongodb.dll, preferably somewhere under the extensions section
7. Restart XAMPP or WAMPP if it is running.
8. Connect to default mongodb connection = mongodb://localhost:27017
9. If connected to mongodb run the command in the IT-PROJECT_laravel directory: php artisan migrate

## Reset Database in Mongodb

- Run the command "php artisan migrate:fresh"

## Install Laravel

1. Make sure to have XAMPP OR WAMP

- WAMP: https://wampserver.aviatechno.net/
- XAMPP: https://www.apachefriends.org/download.html
- Also installs php

2. Install Composer : https://getcomposer.org/download/

- Check path must be in php path (C:xampp\php\php.exe) CHOOSE VERSION 8.2.12 or BELOW
- Skip proxy server
- Install
- Restart cmd/file explorer or restart computer

3. Go to environmental variables

- Go to system variables
- Create new system variable
- Variable name : PHP
- variable value: where php is install (C:xampp\php\php.exe)(go to where php is installed: XAMPP/WAMP)

4. check if composer is installed

- Open cmd
- Type composer --version

5. To install laravel enter command :

- "composer global require laravel/installer"

6. to make sure laravel works with wamp or xampp

- Go to php.ini (C:xampp\php\)
- Open in VS Code
- CRT + F to search
- Search (extension=zip) MAKE SURE TO UNCOMMENT (Remove semi Collon)
- Search (extension=fileinfo) MAKE SURE TO UNCOMMENT (Remove semi Collon)
- Search (extension=mysqli) MAKE SURE TO UNCOMMENT (Remove semi Collon)
- Close php.ini

# SKIP IF PROJECT IS ALREADY IN LARAVEL

7. To Set up the laravel Project

- Open VS terminal
- Go to Project Directory (C:wamp\www\IT PROJECT\IT-PROJECT_Laravel)
- TOP HEADER under "Terminal"
- Click new Terminal
- Laravel new "Name of project"
- Ff there is an error , Restart your VSCode
- SKip staterkit (default)
- Choose Pest (O)
- Choose DB (MYSQL) REFER TO MONGODB

- Migrate Db ? (YES) (WILL SET UP TABLES )(NEW DATABASE)
- Migrate DB ? (NO) (If the DB has already been Setup)

# SKIP IF PROJECT IS ALREADY IN MONGODB

8. Add Database for Laravel (MYSQL)

- Open phpmyadmin
- Click on new Database (name it the same DB on repository "it_project_laravel")
- After installing click import and import database
- Restart wamp (Just in case)
- Migrate Db ? (YES)

9. To open Website

- Enter Localhost in web browser (make sure to empty cache or no history of searching localhost)
- Go To Public Folder to View Website

## Project Setup for Network Access

### Prerequisites
- WAMP Server installed and running
- Node.js and npm installed
- Both devices (laptop and phone) connected to the same network

### Steps to Host Laravel Project for Network Access

#### 1. Configure APP_URL
Set your Laravel application URL in the `.env` file:
```env
APP_URL=http://[YOUR_LAPTOP_IP]/it-project/IT-PROJECT_laravel/public/
```
Replace `[YOUR_LAPTOP_IP]` with your laptop's local network IP address.

#### 2. Configure Vite for Network Access
Update `vite.config.js` to allow external connections:
```javascript
server: {
    host: '0.0.0.0', // Allow external connections
    port: 5173,
    hmr: {
        host: '[YOUR_LAPTOP_IP]', // Replace with your laptop's IP address
    },
},
```

#### 3. Configure WAMP Apache Settings
- Right-click WAMP icon → Apache → vhost-httpd.conf
- Make sure vhost-httpd.conf is default
- Ensure your virtual host includes:
  ```apache
  Options +Indexes +Includes +FollowSymLinks +MultiViews
  AllowOverride All
  Require all granted
  ```
- Restart Apache

#### 4. Configure Windows Firewall for Apache
Follow these steps to allow Apache (httpd.exe) through the firewall:

1. Open Control Panel → Windows Defender Firewall
2. Click "Allow an app through firewall"
3. Click "Change settings" → "Allow another app..."
4. Browse to: `C:\wamp64\bin\apache\apache2.4.xx\bin\httpd.exe`
5. Check both "Private" and "Public" boxes
6. Click "OK"

#### 5. Configure Windows Firewall Communication
1. Open Windows Defender Firewall with Advanced Security
2. Enable rules for both IPv4 and IPv6 "File Sharing and Printing" in both outbound and  inbound rules.

#### 6. Start Development Servers
```bash
# Terminal 1: Start Vite dev server
npx vite --host

#### 6. Access from Mobile Device
- Use your laptop's IP: `http://[YOUR_LAPTOP_IP]/it-project/IT-PROJECT_laravel/public/`
- Vite assets will be served from: `http://[YOUR_LAPTOP_IP]:5173`
```

## Getting started

To make it easy for you to get started with GitLab, here's a list of recommended next steps.

Already a pro? Just edit this README.md and make it your own. Want to make it easy? [Use the template at the bottom](#editing-this-readme)!

## Add your files

- [ ] [Create](https://docs.gitlab.com/ee/user/project/repository/web_editor.html#create-a-file) or [upload](https://docs.gitlab.com/ee/user/project/repository/web_editor.html#upload-a-file) files
- [ ] [Add files using the command line](https://docs.gitlab.com/ee/gitlab-basics/add-file.html#add-a-file-using-the-command-line) or push an existing Git repository with the following command:

```
cd existing_repo
git remote add origin https://gitlab.com/2234098/it-project.git
git branch -M main
git push -uf origin main
```

## Integrate with your tools

- [ ] [Set up project integrations](https://gitlab.com/2234098/it-project/-/settings/integrations)

## Collaborate with your team

- [ ] [Invite team members and collaborators](https://docs.gitlab.com/ee/user/project/members/)
- [ ] [Create a new merge request](https://docs.gitlab.com/ee/user/project/merge_requests/creating_merge_requests.html)
- [ ] [Automatically close issues from merge requests](https://docs.gitlab.com/ee/user/project/issues/managing_issues.html#closing-issues-automatically)
- [ ] [Enable merge request approvals](https://docs.gitlab.com/ee/user/project/merge_requests/approvals/)
- [ ] [Set auto-merge](https://docs.gitlab.com/ee/user/project/merge_requests/merge_when_pipeline_succeeds.html)

## Test and Deploy

Use the built-in continuous integration in GitLab.

- [ ] [Get started with GitLab CI/CD](https://docs.gitlab.com/ee/ci/quick_start/)
- [ ] [Analyze your code for known vulnerabilities with Static Application Security Testing (SAST)](https://docs.gitlab.com/ee/user/application_security/sast/)
- [ ] [Deploy to Kubernetes, Amazon EC2, or Amazon ECS using Auto Deploy](https://docs.gitlab.com/ee/topics/autodevops/requirements.html)
- [ ] [Use pull-based deployments for improved Kubernetes management](https://docs.gitlab.com/ee/user/clusters/agent/)
- [ ] [Set up protected environments](https://docs.gitlab.com/ee/ci/environments/protected_environments.html)

---

# Editing this README

When you're ready to make this README your own, just edit this file and use the handy template below (or feel free to structure it however you want - this is just a starting point!). Thanks to [makeareadme.com](https://www.makeareadme.com/) for this template.

## Suggestions for a good README

Every project is different, so consider which of these sections apply to yours. The sections used in the template are suggestions for most open source projects. Also keep in mind that while a README can be too long and detailed, too long is better than too short. If you think your README is too long, consider utilizing another form of documentation rather than cutting out information.

## Name

Choose a self-explaining name for your project.

## Description

Let people know what your project can do specifically. Provide context and add a link to any reference visitors might be unfamiliar with. A list of Features or a Background subsection can also be added here. If there are alternatives to your project, this is a good place to list differentiating factors.

## Badges

On some READMEs, you may see small images that convey metadata, such as whether or not all the tests are passing for the project. You can use Shields to add some to your README. Many services also have instructions for adding a badge.

## Visuals

Depending on what you are making, it can be a good idea to include screenshots or even a video (you'll frequently see GIFs rather than actual videos). Tools like ttygif can help, but check out Asciinema for a more sophisticated method.

## Installation

Within a particular ecosystem, there may be a common way of installing things, such as using Yarn, NuGet, or Homebrew. However, consider the possibility that whoever is reading your README is a novice and would like more guidance. Listing specific steps helps remove ambiguity and gets people to using your project as quickly as possible. If it only runs in a specific context like a particular programming language version or operating system or has dependencies that have to be installed manually, also add a Requirements subsection.

## Usage

Use examples liberally, and show the expected output if you can. It's helpful to have inline the smallest example of usage that you can demonstrate, while providing links to more sophisticated examples if they are too long to reasonably include in the README.

## Support

Tell people where they can go to for help. It can be any combination of an issue tracker, a chat room, an email address, etc.

## Roadmap

If you have ideas for releases in the future, it is a good idea to list them in the README.

## Contributing

State if you are open to contributions and what your requirements are for accepting them.

For people who want to make changes to your project, it's helpful to have some documentation on how to get started. Perhaps there is a script that they should run or some environment variables that they need to set. Make these steps explicit. These instructions could also be useful to your future self.

You can also document commands to lint the code or run tests. These steps help to ensure high code quality and reduce the likelihood that the changes inadvertently break something. Having instructions for running tests is especially helpful if it requires external setup, such as starting a Selenium server for testing in a browser.

## Authors and acknowledgment

Show your appreciation to those who have contributed to the project.

## License

For open source projects, say how it is licensed.

## Project status

If you have run out of energy or time for your project, put a note at the top of the README saying that development has slowed down or stopped completely. Someone may choose to fork your project or volunteer to step in as a maintainer or owner, allowing your project to keep going. You can also make an explicit request for maintainers.
