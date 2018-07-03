'use strict';
let mix = require('laravel-mix');

function IOUser(params={}){
  let dep = {
    user: 'node_modules/intranetone-user/src/',
  }

  this.compile = (IO,callback = ()=>{})=>{

    mix.styles([
      IO.src.io.vendors + 'aanjulena-bs-toggle-switch/aanjulena-bs-toggle-switch.css',
      IO.dep.io.toastr + 'toastr.min.css',
      dep.user + 'user.css',
    ], IO.dest.io.root + 'services/io-user.min.css');

    mix.babel([
      IO.src.io.vendors + 'aanjulena-bs-toggle-switch/aanjulena-bs-toggle-switch.js',
      IO.src.io.js + 'defaults/def-toastr.js',
      dep.user + 'user.js',
    ], IO.dest.io.root + 'services/io-user-babel.min.js');
    
    // mix.scripts([
    // ], IO.dest.io.root + 'services/io-user-mix.min.js');

    callback(IO);
  }
}

module.exports = IOUser;
