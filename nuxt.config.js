module.exports = {
  /*
  ** Headers of the page
  */
  head: {
    title: 'album.local',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
    ]
  },
  plugins: [
    '~/plugins/element-ui.js'
  ],
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/toast',
  ],
  toast: {
    position: 'top-right',
    duration: 1000
  },
  axios: {
    baseURL: 'http://127.0.0.1:8000/api'
  },
  /*
  ** Customize the progress bar color
  */
  loading: { color: '#3B8070' },
  /*
  ** Build configuration
  */
  build: {
    vendor: [
      'element-ui'
    ],
    /*
    ** Run ESLint on save
    */
    extend (config, { isDev, isClient }) {
      if (isDev && isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  }
}

