# AWS PHP DevOps Pet Project

Multi-container web application deployed on AWS EC2 using Docker Compose.

## Stack
- AWS EC2 (Ubuntu)
- Docker
- Docker Compose
- Nginx
- Apache + PHP
- MySQL

## Architecture
Browser -> Nginx -> Apache/PHP -> MySQL

## Features
- Task input form
- MySQL-backed task storage
- Health endpoint

## Run
```bash
docker compose up -d --build
