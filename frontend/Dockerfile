FROM node:14-alpine3.14 
WORKDIR /var/www/frontend/frontend
COPY ./frontend/package.json /var/www/frontend
RUN npm install
COPY /frontend /var/www/frontend
EXPOSE 3000
CMD ["npm", "start"]