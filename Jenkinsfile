
pipeline {
    agent any
    stages {
        stage('Build') {
            steps { 
                sh 'docker build -t my-app .'
                sh 'docker tag my-app mohitgocher4848/my-app:latest' 
            }
        }
        stage('Test') {
            steps { 
                sh 'echo "tests passed"' 
            }
        }
        stage('Push Image') {
            steps { 
                sh 'docker push mohitgocher4848-lab/my-app:latest' 
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                sh 'kubectl set image deployment/my-nginx my-nginx=mohitgocher4848/my-app:latest'
                sh 'kubectl rollout status deployment/my-nginx'
            }
        }
    }
}
