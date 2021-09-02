<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8" />
    <title>Hızır Servisler</title>
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/assest/css/style.css">
    <script src="<?php echo base_url(''); ?>/assest/jquery.min.js"></script>
    <style>
        .SubMenu {
            display: none;
        }
    </style>
</head>

<body id="api-reference">
    <div id="app">
        <!-- loading bar -->
        <div id="loading-bar"></div>
        <!-- header -->
        <div id="header">
            <div class="header-section header-section-sidebar">
                <div class="logo">
                    <b>Hızır Servisler</b>
                </div>
            </div>
            <div class="header-section header-section-copy">
                <!-- sidebar replacement for smaller screens -->
                <div class="select-field jump-menu">
                    <select>
                        <optgroup label="Introduction">
                            <option value="intro">Introduction</option>
                        </optgroup>
                        <optgroup label="Topics">
                            <option value="aşı">Aşı</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div id="sidebar">
            <nav role="navigation" class="sidebar-nav">
                <h5 class="sidebar-nav-heading">Hızır Servisler</h5>
                <ul class="sidebar-nav-items">
                    <li><a class="sidebar-nav-item" href="#intro">Giriş</a></li>
                </ul>
                <h5 class="sidebar-nav-heading">Servisler</h5>
                <ul class="sidebar-nav-items">
                    <li v-for="category in allcategories" v-bind:id="'Controller'+category.slug">
                        <a @click="subac()" class="sidebar-nav-item Sub">{{ category.name }}</a>
                        <ul class="sidebar-nav-items SubMenu">
                            <li v-for="submethod in category.submethods">
                                <a class="sidebar-nav-item" v-bind:href="'#' + submethod.slug">{{ submethod.name }} ({{ submethod.requestType }})</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar-nav-items">
                    <li><a class="sidebar-nav-item disabled" href="#intro">Versiyon v1.0.0.0</a></li>
                </ul>
            </nav>
        </div>
        <!-- example background -->
        <div id="background">
            <div class="background-actual"></div>
        </div>
        <!-- api docs -->
        <div id="content">
            <section class="method first-of-group" id="intro">
                <div class="method-area">
                    <div class="method-copy">
                        <div class="method-copy-padding">
                            <h1>USS Servisler</h1>
                            <p>
                                Bu Adres HızırWeb Uygulaması Geliştirilirken Kullanılmak Üzere Hazırlanmıştır. Method Adları İstek Tipi ve Örnek JSON result'ları Bulunmaktadır.
                            </p>
                            Sistem Rest tabanlı olarak geliştirilmiştir ve methodların yanında (Post, Get, ..) olarak
                            kullanılan yöntemler belirtilmiştir.
                            <p>
                                Sonuç olarak iki farklı durum geçerlidir. Başarılı sonuçlar için "IsSuccessful": 1 başarısız
                                sonuçlar için ise "IsSuccessful": 0 sonucu dönülmektedir.
                            </p>
                            <p>
                                Ulaşım adresi : <code class="language-undefined">http://localhost:3598/api/</code>
                            </p>
                        </div>
                    </div>
                    <div class="method-example">
                        <p>
                            Örnek kullanım aşağıdaki gibidir;
                        </p>
                        <div class="method-example-part">
                            <pre class="language-undefined"> <code class="language-undefined"> 
                        </pre>
                        </div>
                    </div>
                </div>
            </section>
            <section v-for="method in allmethods" class="method" v-bind:id="method.slug">
                <div class="method-area">
                    <div class="method-copy">
                        <div class="method-copy-padding">
                            <h1>{{method.name}} ({{method.requestType}})</h1>
                            <p>
                                {{method.requestComment}}
                            </p>
                            <p>
                                İstek Adresi : <code class="language-undefined">{{method.requestaddress}}</code>
                            </p>
                        </div>
                        <div class="method-list method-list-arguments">
                            <h5 class="method-list-title">
                                İstek Model
                            </h5>
                            <ul class="method-list-group">
                                <div class="method-example-part">
                                    <div class="method-example-response">
                                        <pre class="language-json"><code class="language-json">{{method.requestJson}}</code></pre>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="method-copy-padding">
                            <h2>Sonuç</h2>
                            <p>
                                {{method.responseComment}}
                            </p>
                        </div>
                    </div>

                    <div class="method-example">
                        <div class="method-example-part">
                            <div class="method-example-response">
                                <pre class="language-json"> <code class="language-json">{{method.responseJson}}</code>
                        </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script type="application/javascript">

            </script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                allcategories: [],
                allmethods: []
            },
            methods: {
                subac() {
                    $("#sidebar .Sub").on("click", function() {
                        $("#sidebar .SubMenu").css("display", "none");
                        $("#" + $(this).parent().attr("id") + " ul").fadeIn();
                    });
                    console.log("çalıştı")
                },
                getlist() {
                    axios.get('http://localhost/ApiDoc/CategoriesController/allcategoriesandmethos/').then(response => (this.allcategories = response.data));
                    axios.get('http://localhost/ApiDoc/MethodsController/allmethods/').then(response => (this.allmethods = response.data));
                }
            },
            mounted() {
                this.getlist();
            }
        })
    </script>



</body>

</html>