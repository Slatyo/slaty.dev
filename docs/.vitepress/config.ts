import { defineConfig } from 'vitepress'

export default defineConfig({
  title: 'slaty.dev',
  description: 'Developer portfolio documentation — Slaty',
  lang: 'en',

  themeConfig: {
    nav: [
      { text: 'Home', link: '/' },
      { text: 'Guide', link: '/guide/getting-started' },
      { text: 'Reference', link: '/reference/tech-stack' },
    ],

    sidebar: [
      {
        text: 'Guide',
        items: [
          { text: 'Getting Started', link: '/guide/getting-started' },
          { text: 'Local Development', link: '/guide/local-development' },
          { text: 'Deployment', link: '/guide/deployment' },
        ],
      },
      {
        text: 'Reference',
        items: [
          { text: 'Tech Stack', link: '/reference/tech-stack' },
          { text: 'Project Structure', link: '/reference/project-structure' },
          { text: 'Projects', link: '/reference/projects' },
          { text: 'SEO & Meta', link: '/reference/seo' },
        ],
      },
    ],

    socialLinks: [
      { icon: 'github', link: 'https://github.com/Slatyo/slaty.dev' },
    ],

    footer: {
      message: 'slaty.dev — Personal portfolio site.',
      copyright: 'Slaty',
    },
  },

  head: [
    ['link', { rel: 'icon', href: '/favicon.svg', type: 'image/svg+xml' }],
  ],
})
