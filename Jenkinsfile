pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "ukrninja/aws-php-devops-pet"
        DOCKER_TAG = "latest"
    }

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} ."
            }
        }

        stage('Login to Docker Hub') {
            steps {
                withCredentials([usernamePassword(
                    credentialsId: 'dockerhub-creds',
                    usernameVariable: 'DOCKER_USER',
                    passwordVariable: 'DOCKER_PASS'
                )]) {
                    sh 'echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin'
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                sh "docker push ${DOCKER_IMAGE}:${DOCKER_TAG}"
            }
        }

        stage('Deploy to app server') {
            steps {
                sshagent(['app-server-ssh']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no ubuntu@16.171.21.25 "
                            docker pull ukrninja/aws-php-devops-pet:latest &&
                            cd ~/projects/aws-php-devops-pet &&
                            docker compose up -d
                        "
                    '''
                }
            }
        }
    }

    post {
        always {
            sh 'docker logout || true'
        }
    }
}