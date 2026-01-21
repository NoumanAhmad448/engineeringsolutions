#!/bin/bash

# Set working directory
APP_DIR="/home/nomilyskills/public_html/solutions.burraqengineering.com"

# Make sure the web directory is owned by the current user to avoid permission issues
sudo chown -R $USER:$USER "$APP_DIR"

# Load NVM function
load_nvm() {
  export NVM_DIR="$HOME/.nvm"
  if [ -s "$NVM_DIR/nvm.sh" ]; then
    \. "$NVM_DIR/nvm.sh"
    echo "nvm loaded successfully."
  else
    echo "nvm not found, installing..."
    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash
    export NVM_DIR="$HOME/.nvm"
    [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
  fi
}

# Load nvm
load_nvm

# Check Node.js version and install if needed
NODE_VERSION="20.18.3"
if [[ "$(node -v)" != "v$NODE_VERSION" ]]; then
  echo "Installing Node.js $NODE_VERSION..."
  nvm install $NODE_VERSION
fi

# Use the correct Node.js version
nvm use $NODE_VERSION

# Navigate to app directory
cd "$APP_DIR" || exit 1

# Where am I?
pwd

# Optional: clean node_modules & cache (useful on fresh install or major upgrades)
# rm -rf node_modules package-lock.json
# npm cache clean --force

# Install dependencies
npm install

# Fix vulnerabilities (optional, but safe for CI/CD)
npm audit fix --force || true

# Build Next.js project for production
npm run build

# Start Next.js in production mode
# Depending on hosting, you may use `npm start` or PM2 to run it as a daemon
npm install -g pm2
pm2 -v

pm2 start npm --name "engineeringsolutions" -- start
pm2 list
pm2 save
pm2 startup

pm2 logs engineeringsolutions
pm2 stop engineeringsolutions

pm2 restart engineeringsolutions

# Secure .env file
if [ -f "$APP_DIR/.env" ]; then
  chmod 600 "$APP_DIR/.env"
fi

echo "✅ Deployment script completed successfully."
