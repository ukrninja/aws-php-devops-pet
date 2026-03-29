pipeline {
    agent any

    stages {
        stage('Deploy to app server') {
            steps {
                sshagent(['app-server-ssh']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no ubuntu@16.171.21.25 "cd ~/projects/aws-php-devops-pet && git pull && ./deploy.sh"
                    '''
                }
            }
        }
    }
}
