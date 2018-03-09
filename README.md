# angka-pendidikan-ditamatkan

[![Join the chat at https://gitter.im/angka-pendidikan-ditamatkan/Lobby](https://badges.gitter.im/angka-pendidikan-ditamatkan/Lobby.svg)](https://gitter.im/angka-pendidikan-ditamatkan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/angka-pendidikan-ditamatkan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-pendidikan-ditamatkan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/angka-pendidikan-ditamatkan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/angka-pendidikan-ditamatkan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/v/stable)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)
[![Total Downloads](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/downloads)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/v/unstable)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)
[![License](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/license)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/d/monthly)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/angka-pendidikan-ditamatkan/d/daily)](https://packagist.org/packages/bantenprov/angka-pendidikan-ditamatkan)

Angka Pendidikan Yang Ditamatkan (APT) Menurut Kabupaten / Kota

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/angka-pendidikan-ditamatkan:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/angka-pendidikan-ditamatkan
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/angka-pendidikan-ditamatkan.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\PendidikanDitamatkan\PendidikanDitamatkanServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=angka-pendidikan-ditamatkan-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovPendidikanDitamatkanSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=angka-pendidikan-ditamatkan-assets
$ php artisan vendor:publish --tag=angka-pendidikan-ditamatkan-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/angka-pendidikan-ditamatkan',
         components: {
            main: resolve => require(['./components/views/bantenprov/angka-pendidikan-ditamatkan/DashboardPendidikanDitamatkan.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Angka Pendidikan Yang Ditamatkan"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/angka-pendidikan-ditamatkan',
            components: {
                main: resolve => require(['./components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkan.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Angka Pendidikan Yang Ditamatkan"
            }
        },
        {
            path: '/admin/angka-pendidikan-ditamatkan/create',
            components: {
                main: resolve => require(['./components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkan.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Angka Pendidikan Yang Ditamatkan"
            }
        },
        {
            path: '/admin/angka-pendidikan-ditamatkan/:id',
            components: {
                main: resolve => require(['./components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkan.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Angka Pendidikan Yang Ditamatkan"
            }
        },
        {
            path: '/admin/angka-pendidikan-ditamatkan/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkan.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Angka Pendidikan Yang Ditamatkan"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Angka Pendidikan Yang Ditamatkan',
        link: '/dashboard/angka-pendidikan-ditamatkan',
        icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
        name: 'Angka Pendidikan Yang Ditamatkan',
        link: '/admin/angka-pendidikan-ditamatkan',
        icon: 'fa fa-angle-double-right'
      },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Angka Pendidikan Yang Ditamatkan

import PendidikanDitamatkan from './components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkan.chart.vue';
Vue.component('echarts-angka-pendidikan-ditamatkan', PendidikanDitamatkan);

import PendidikanDitamatkanKota from './components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanKota.chart.vue';
Vue.component('echarts-angka-pendidikan-ditamatkan-kota', PendidikanDitamatkanKota);

import PendidikanDitamatkanTahun from './components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanTahun.chart.vue';
Vue.component('echarts-angka-pendidikan-ditamatkan-tahun', PendidikanDitamatkanTahun);

import PendidikanDitamatkanAdminShow from './components/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanAdmin.show.vue';
Vue.component('admin-view-angka-pendidikan-ditamatkan-tahun', PendidikanDitamatkanAdminShow);

//== Echarts Group Egoverment

import PendidikanDitamatkanBar01 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanBar01.vue';
Vue.component('angka-pendidikan-ditamatkan-bar-01', PendidikanDitamatkanBar01);

import PendidikanDitamatkanBar02 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanBar02.vue';
Vue.component('angka-pendidikan-ditamatkan-bar-02', PendidikanDitamatkanBar02);

//== mini bar charts
import PendidikanDitamatkanBar03 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanBar03.vue';
Vue.component('angka-pendidikan-ditamatkan-bar-03', PendidikanDitamatkanBar03);

import PendidikanDitamatkanPie01 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanPie01.vue';
Vue.component('angka-pendidikan-ditamatkan-pie-01', PendidikanDitamatkanPie01);

import PendidikanDitamatkanPie02 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanPie02.vue';
Vue.component('angka-pendidikan-ditamatkan-pie-02', PendidikanDitamatkanPie02);

//== mini pie charts
import PendidikanDitamatkanPie03 from './components/views/bantenprov/angka-pendidikan-ditamatkan/PendidikanDitamatkanPie03.vue';
Vue.component('angka-pendidikan-ditamatkan-pie-03', PendidikanDitamatkanPie03);
```

