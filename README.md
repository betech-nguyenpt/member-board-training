# member-board training
## Requirements
1. Vagrant: latest version
2. Virtualbox: latest version

## Install Laravel Homestead

### Download Homestead
Download [Laravel Homestead](https://drive.google.com/file/d/1smDwBvFV2L06GbdQWrewH0wnkFF9fTly/view?usp=sharing) and unzip **laravel-homestead.zip**
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
    [vagrant@localhost ~]$ composer install
    [vagrant@localhost ~]$ composer dump-autoload
```

### Access
```bash
    http://local-member-board.betech.com/
```

![image](https://user-images.githubusercontent.com/65880494/168237543-756da99b-03d1-4b90-a457-c2e1bdaa0d87.png)

## NOTE: 

### MySQL account:
```
    username: homestead
    password: secret
```
