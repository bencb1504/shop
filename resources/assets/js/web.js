window._ = require('lodash');

window.axios = require('axios');

let store = require('./store');
// const accessToken = store.getToken();

let token = document.head.querySelector('meta[name="csrf-token"]');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = window.web.api_url;

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.axios.interceptors.request.use(
    config => {
      if (!config.headers.Authorization) {
        // if (accessToken) {
        //   config.headers.Authorization = `Bearer ${accessToken}`;
        // }
      }
  
      return config;
    },
    error => {console.log(error)}
  );
  

require('./web/index/index');
require('./web/product_detail/product_detail');