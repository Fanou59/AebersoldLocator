# Dockerfile

# Utilisez une image Node.js officielle
FROM node:18

# Installez pnpm globalement
RUN npm install -g pnpm

# Définissez le répertoire de travail dans le conteneur
WORKDIR /usr/src/app

# Copiez les fichiers package.json et pnpm-lock.yaml
COPY package.json pnpm-lock.yaml ./

# Installez les dépendances de l'application avec pnpm
RUN pnpm install

# Copiez le reste des fichiers de l'application
COPY . .

# Exposez le port sur lequel l'application écoute
EXPOSE 3000

# Commande pour démarrer l'application
CMD ["node", "app.js"]
