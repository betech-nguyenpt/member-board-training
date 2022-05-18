# member-board training
## Requirements
1. Vagrant: latest version
2. Virtualbox: latest version

## Install Laravel Homestead

### Download Homestead
Download [Laravel Homestead](https://drive.google.com/file/d/15K4XSuygUYMbZw-sfKsmECC_Lwz4GXxB/view?usp=sharing) and unzip **laravel-homestead.zip**
```
    --laravel-homestead
        |--.ssh
            |--id_rsa_member_board
            |--id_rsa_member_board.pub
        |--.vagrant.d
            |--boxes
                |--laravel-VAGRANTSLASH-homestead
        |--homestead
            |--...
            |--Homestead.yaml
            |--...
```

### Prepare vagrant box:
Copy folder 
```bash
    laravel-homestead\.vagrant.d\boxes\laravel-VAGRANTSLASH-homestead
```

to folder
```bash
    C:\Users\{username}\.vagrant.d\boxes
```

### Prepare ssh key:
Copy file
```
    laravel-homestead\.ssh\id_rsa_member_board
    laravel-homestead\.ssh\id_rsa_member_board.pub
```

to folder
```bash
    C:\Users\{username}\.ssh
```

## Connect source code member-board to Homestead

### Clone source code
Ex: <path/to/projectroot> = D:\Source\member-board
```bash
    $ cd D:\Source
    $ git clone git@github.com:bisync/member-board.git -b main
```

### Connect
Edit file config **laravel-homestead\homestead\Homestead.yaml**:
```yaml
    # Configure ip, memory and cpus
    ip: "192.168.19.19"
    memory: 4048
    cpus: 2

    # Configure path to source files:
    folders:
    - map: <path/to/projectroot>
        to: /home/vagrant/member-board/
        type: "rsync"
        options:
            rsync__args: ["--verbose", "--archive", "--delete", "-zz"]
            rsync__exclude: ["node_modules"]
    sites:
    - map: local-member-board.betech.com
        to: /home/vagrant/member-board/web/public
```

### Redirect
Open hosts file and add below line:
```
    192.168.19.19  local-member-board.betech.com
```

## Run

### Start Virtual machine
```bash
    $ cd {path/to/homestead}
    $ vagrant up
```

### Close Virtual machine
```bash
    $ cd {path/to/homestead}
    $ vagrant halt
```

### Reflect Virtual machine
```bash
    $ cd {path/to/homestead}
    $ vagrant up --provision
```

### Update web dependency
```bash
    $ vagrant ssh
    [vagrant@localhost ~]$ cd member-board/web
    [vagrant@localhost ~/member-board/web$]$ composer self-update --2
    [vagrant@localhost ~/member-board/web$]$ composer install
    [vagrant@localhost ~/member-board/web$]$ composer dump-autoload
```

### Automatic PHPDoc generation for Laravel Facades
```bash
    [vagrant@localhost ~/member-board/web$]$ php artisan ide-helper:generate
```

### Compiling Assets (Laravel Mix)
```bash
    // Installing Laravel Mix
    [vagrant@localhost ~/member-board/web$]$ npm install
    
    // Run all Mix tasks...
    [vagrant@localhost ~/member-board/web$]$ npm run dev
    
    // Run all Mix tasks and minify output...
    [vagrant@localhost ~/member-board/web$]$ npm run prod
    
    // Watching Assets For Changes
    [vagrant@localhost ~/member-board/web$]$ npm run watch-poll
```

### Access
```bash
    http://local-member-board.betech.com/
```
If you run "npm run watch-poll" :
```bash
    http://local-member-board.betech.com:8888/
```

![image](https://user-images.githubusercontent.com/65880494/168237543-756da99b-03d1-4b90-a457-c2e1bdaa0d87.png)

## NOTE: 

### MySQL account:
```
    username: homestead
    password: secret
```
### Errors and solution:
**Error message:**
```
   There was an error while executing `VBoxManage`, a CLI used by Vagrant
for controlling VirtualBox. The command and stderr is shown below.

Command: ["startvm", "6db12784-0b71-4989-a53e-03b9a096bc12", "--type", "headless"]
Stderr: VBoxManage.exe: error: Failed to open/create the internal network 'HostInterfaceNetworking-VirtualBox Host-Only Ethernet Adapter #3' (VERR_INTNET_FLT_IF_NOT_FOUND).

VBoxManage.exe: error: Failed to attach the network LUN (VERR_INTNET_FLT_IF_NOT_FOUND)
VBoxManage.exe: error: Details: code E_FAIL (0x80004005), component ConsoleWrap, interface IConsole
```
**Solution:**
```
1/ Open Network and Sharing Center and go to the Change adapter settings in the sidebar.

2/ Right-click on the host-only adapter in the list of adapters and then Configure button -> Driver tab -> Update driver button.

3/ Select Browse my computer ... and in the next dialog select Let me pick .... You should see the list with just host-only driver in it.

4/ Select it and click next. After the driver is updated, please try using host-only network in a VM again.
```
