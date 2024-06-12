<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            // Front-End Technologies and Frameworks
            ['name' => 'HTML', 'type' => 'Front-End Technology'],
            ['name' => 'CSS', 'type' => 'Front-End Technology'],
            ['name' => 'JavaScript', 'type' => 'Front-End Technology'],
            ['name' => 'TypeScript', 'type' => 'Front-End Technology'],
            ['name' => 'React', 'type' => 'Front-End Framework'],
            ['name' => 'Angular', 'type' => 'Front-End Framework'],
            ['name' => 'Vue.js', 'type' => 'Front-End Framework'],
            ['name' => 'Svelte', 'type' => 'Front-End Framework'],
            ['name' => 'Ember.js', 'type' => 'Front-End Framework'],
            ['name' => 'Backbone.js', 'type' => 'Front-End Framework'],
            ['name' => 'Preact', 'type' => 'Front-End Framework'],
            ['name' => 'Alpine.js', 'type' => 'Front-End Framework'],
            ['name' => 'LitElement', 'type' => 'Front-End Framework'],
            ['name' => 'Stencil', 'type' => 'Front-End Framework'],
            ['name' => 'Solid.js', 'type' => 'Front-End Framework'],
            ['name' => 'Hyperapp', 'type' => 'Front-End Framework'],
            ['name' => 'Inferno', 'type' => 'Front-End Framework'],
            ['name' => 'Marko', 'type' => 'Front-End Framework'],
            ['name' => 'Aurelia', 'type' => 'Front-End Framework'],
            ['name' => 'Riot.js', 'type' => 'Front-End Framework'],
            ['name' => 'Mithril', 'type' => 'Front-End Framework'],
            ['name' => 'Nuxt.js', 'type' => 'Front-End Framework'],
            ['name' => 'Next.js', 'type' => 'Front-End Framework'],
            ['name' => 'Gatsby', 'type' => 'Front-End Framework'],
            ['name' => 'Gridsome', 'type' => 'Front-End Framework'],
            ['name' => 'Quasar', 'type' => 'Front-End Framework'],
            ['name' => 'Eleventy', 'type' => 'Front-End Framework'],
            ['name' => 'Sapper', 'type' => 'Front-End Framework'],
            ['name' => 'Foundation', 'type' => 'Front-End Framework'],
            ['name' => 'Bootstrap', 'type' => 'Front-End Framework'],
            ['name' => 'Bulma', 'type' => 'Front-End Framework'],
            ['name' => 'Tailwind CSS', 'type' => 'Front-End Framework'],
            ['name' => 'Materialize', 'type' => 'Front-End Framework'],
            ['name' => 'Semantic UI', 'type' => 'Front-End Framework'],
            ['name' => 'UIKit', 'type' => 'Front-End Framework'],
            ['name' => 'PureCSS', 'type' => 'Front-End Framework'],
            ['name' => 'Susy', 'type' => 'Front-End Framework'],
            ['name' => 'Tachyons', 'type' => 'Front-End Framework'],
            ['name' => 'Chakra UI', 'type' => 'Front-End Framework'],
            ['name' => 'Ant Design', 'type' => 'Front-End Framework'],
            ['name' => 'Element UI', 'type' => 'Front-End Framework'],
            ['name' => 'PrimeFaces', 'type' => 'Front-End Framework'],
            ['name' => 'Kendo UI', 'type' => 'Front-End Framework'],
            ['name' => 'Onsen UI', 'type' => 'Front-End Framework'],
            ['name' => 'Framework7', 'type' => 'Front-End Framework'],
            ['name' => 'Vaadin', 'type' => 'Front-End Framework'],
            ['name' => 'DevExtreme', 'type' => 'Front-End Framework'],
            ['name' => 'jQuery', 'type' => 'Front-End Technology'],
            ['name' => 'jQuery UI', 'type' => 'Front-End Framework'],
            ['name' => 'jQuery Mobile', 'type' => 'Front-End Framework'],
            ['name' => 'Ext JS', 'type' => 'Front-End Framework'],
            ['name' => 'Dojo Toolkit', 'type' => 'Front-End Framework'],
            ['name' => 'Web Components', 'type' => 'Front-End Technology'],
            ['name' => 'Polymer', 'type' => 'Front-End Framework'],
            ['name' => 'Backbone.js', 'type' => 'Front-End Framework'],
            ['name' => 'SproutCore', 'type' => 'Front-End Framework'],
            ['name' => 'CanJS', 'type' => 'Front-End Framework'],
            ['name' => 'Knockout.js', 'type' => 'Front-End Framework'],
            ['name' => 'Ractive.js', 'type' => 'Front-End Framework'],
            ['name' => 'Flight', 'type' => 'Front-End Framework'],
            ['name' => 'Chaplin', 'type' => 'Front-End Framework'],
            ['name' => 'Marionette.js', 'type' => 'Front-End Framework'],
            ['name' => 'Glimmer', 'type' => 'Front-End Framework'],
            ['name' => 'Redux', 'type' => 'Front-End Technology'],
            ['name' => 'MobX', 'type' => 'Front-End Technology'],
            ['name' => 'Recoil', 'type' => 'Front-End Technology'],
            ['name' => 'Apollo Client', 'type' => 'Front-End Technology'],
            ['name' => 'Relay', 'type' => 'Front-End Technology'],
            ['name' => 'Vuex', 'type' => 'Front-End Technology'],
            ['name' => 'Pinia', 'type' => 'Front-End Technology'],
            ['name' => 'RxJS', 'type' => 'Front-End Technology'],
            ['name' => 'D3.js', 'type' => 'Front-End Technology'],
            ['name' => 'Three.js', 'type' => 'Front-End Technology'],
            ['name' => 'Chart.js', 'type' => 'Front-End Technology'],
            ['name' => 'PixiJS', 'type' => 'Front-End Technology'],
            ['name' => 'Babel', 'type' => 'Front-End Technology'],
            ['name' => 'Webpack', 'type' => 'Front-End Technology'],
            ['name' => 'Parcel', 'type' => 'Front-End Technology'],
            ['name' => 'Rollup', 'type' => 'Front-End Technology'],
            ['name' => 'Gulp', 'type' => 'Front-End Technology'],
            ['name' => 'Grunt', 'type' => 'Front-End Technology'],
            ['name' => 'ESLint', 'type' => 'Front-End Technology'],
            ['name' => 'Prettier', 'type' => 'Front-End Technology'],
            ['name' => 'Storybook', 'type' => 'Front-End Technology'],
            ['name' => 'Jest', 'type' => 'Front-End Technology'],
            ['name' => 'Mocha', 'type' => 'Front-End Technology'],
            ['name' => 'Chai', 'type' => 'Front-End Technology'],
            ['name' => 'Cypress', 'type' => 'Front-End Technology'],
            ['name' => 'Puppeteer', 'type' => 'Front-End Technology'],
            ['name' => 'Playwright', 'type' => 'Front-End Technology'],
            ['name' => 'QUnit', 'type' => 'Front-End Technology'],
            ['name' => 'Jasmine', 'type' => 'Front-End Technology'],
            ['name' => 'Karma', 'type' => 'Front-End Technology'],
            ['name' => 'AVA', 'type' => 'Front-End Technology'],
            ['name' => 'Sinon.js', 'type' => 'Front-End Technology'],
        ];

        DB::table('skills')->insert($skills);
    }
}
