import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
    title: "Hyperf Get Started",
    description: "A Hyperf Sample Site",
    themeConfig: {
        // https://vitepress.dev/reference/default-theme-config
        nav: [
            { text: '核心架构', link: '/core/annotation' },
        ],

        sidebar: [
            {
                text: '核心架构',
                items: [
                    { text: '注解', link: '/core/annotation' },
                    { text: 'Aop', link: '/core/aop' },
                ]
            }
        ],

        socialLinks: [
            { icon: 'github', link: 'https://github.com/imvkmark/hyperf-get-started' }
        ]
    }
})
