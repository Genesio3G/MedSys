const { LogLevel } = require("@angular/compiler-cli");

const PROXY_CONFIG = [
    {
        context:['/api'],
        target:'http://localhost:8000/',
        secure: false,
        LogLevel:'debug',
        pathRewrite:{'^/api':''},
        changeOrigin: true,
        withCredentials: true
    }
]

module.exports = PROXY_CONFIG;