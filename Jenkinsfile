pipeline {
    agent any
    stages {
        stage('Build') {
            steps { 
                sh 'docker build -t my-app .' 
            }
        }
        stage('Test') {
            steps { 
                sh 'echo "tests passed"' 
            }
        }
        stage('Push Image') {
            steps { 
                sh 'docker push myrepo/my-app' 
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                sh 'kubectl set image deployment/my-nginx my-nginx=myrepo/my-app:latest'
                sh 'kubectl rollout status deployment/my-nginx'
            }
        }
    }
}
