Installation
============

### Requirements
- Download **docker** and **docker-compose** binaries for initialization
- **make** executable

**Step 1:**
- Executing docker as regular user: **(only for linux)**

**Note:** If your docker executable already running by your user then, you can skip this step.

```shell
sudo groupadd docker
sudo usermod -aG docker ${USER}
su -s ${USER}

# For testing
docker --version
```

**Step 2:**

Open a command console, enter your project directory and execute:

```console
$ make init
$ make app-init
```

Create env file from env.example
Configure database connection by docker-compose file


Generate key 
```console
$ make generate
```

Migrate tables
```console
$ make migrate
```
Add storage link in public 
```console
$ make storage-link
```

Open web page http://127.0.0.1:8889
Open phpmyadmin page http://127.0.0.1:8021

CHANGE QUEUE_CONNECTION from sync to database
```console
$ make queue-work
```
