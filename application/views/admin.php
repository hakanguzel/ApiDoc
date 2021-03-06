<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hızır Servis Bilgisi Ekleme</title>
</head>

<body>
    <div class="col-md-12" id="app">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Anasayfa</li>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Kategori Ekle
                </button>
            </ol>
        </nav>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Method Adı</label>
                                    <input type="text" class=" form-control form-control-sm" placeholder="Method Adı" v-model="methodmodel.MethodAdi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Örnek Adres</label>
                                    <input type="text" class=" form-control form-control-sm" placeholder="Method Adı" v-model="methodmodel.OrnekAdres">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Method Açıklama</label>
                                    <textarea id="summernote" style="width: 100%;height: 250px;" v-model="methodmodel.MethodAciklama"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sonuç Açıklama</label>
                                    <textarea id="summernote3" style="width: 100%;height: 250px;" v-model="methodmodel.SonucAciklama"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <select class=" form-control form-control-sm" id="exampleFormControlSelect1" v-model="methodmodel.kategoriid">
                                        <?php foreach ($categories as $kategori) { ?>
                                            <option value="<?php echo $kategori->KategoriId; ?>"><?php echo $kategori->KategoriAdi; ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İstek Method</label>
                                    <select class=" form-control form-control-sm" id="exampleFormControlSelect1" v-model="methodmodel.MethodYontemi">
                                        <option value="GET">GET</option>
                                        <option value="POST">POST</option>
                                        <option value="PUT">PUT</option>
                                        <option value="PATCH">PATCH</option>
                                        <option value="DELETE">DELETE</option>
                                        <option value="COPY">COPY</option>
                                        <option value="HEAD">HEAD</option>
                                        <option value="OPTIONS">OPTIONS</option>
                                        <option value="LINK">LINK</option>
                                        <option value="UNLINK">UNLINK</option>
                                        <option value="PURGE">PURGE</option>
                                        <option value="LOCK">LOCK</option>
                                        <option value="UNLOCK">UNLOCK</option>
                                        <option value="PROPFIND">PROPFIND</option>
                                        <option value="VIEW">VIEW</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">İstek JSON</label>
                                    <textarea id="summernote2" style="width: 100%;height: 250px;" v-model="methodmodel.IstekModel"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sonuç JSON</label>
                                    <textarea id="summernote4" style="width: 100%;height: 250px;" v-model="methodmodel.SonucJson"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger float-right" @click="iptal()">İptal</button>
                    <button type="submit" class="btn btn-primary float-right" @click="Kaydet()">Kaydet</button>
                </div>
                <div class="col-md-4">
                    <table class="table scroll">
                        <thead>
                            <tr>
                                <th scope="col">Adı</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="method in methodmodels">
                                <th>{{ method.MethodAdi }} ( {{ method.MethodYontemi }} )</th>
                                <td>
                                    <button type="button" class="btn btn-primary" @click="Duzenle(method.MethodId)">Düzenle</button>
                                    <button type="button" class="btn btn-danger" @click="Sil(method.MethodId)">Sil</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" v-model="kategorimodel.KategoriAdi">
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori Adı</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="kategorim in kategorimodels">
                                    <th>{{ kategorim.KategoriAdi }}</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                methodmodel: {
                    MethodId: null,
                    MethodAdi: null,
                    IstekModel: null,
                    SonucAciklama: null,
                    SonucJson: null,
                    methodseo: null,
                    kategoriid: null,
                    MethodAciklama: null,
                    OrnekAdres: null,
                    MethodYontemi: null
                },
                resetmethodmodel: {
                    MethodId: null,
                    MethodAdi: null,
                    IstekModel: null,
                    SonucAciklama: null,
                    SonucJson: null,
                    methodseo: null,
                    kategoriid: null,
                    MethodAciklama: null,
                    OrnekAdres: null,
                    MethodYontemi: null
                },
                kategorimodel: {
                    KategoriId: null,
                    KategoriAdi: null,
                    KategoriSeo: null
                },
                methodmodels: [],
                kategorimodels: []
            },
            methods: {
                async Duzenle(id) {
                    await axios.get('http://192.168.1.115/hizirapi/AdminController/methodduzenle/' + id).then(response => (
                        this.methodmodel = response.data
                    ));
                    console.log(this.methodmodel)
                },
                async Kaydet() {
                    await axios.post('http://192.168.1.115/hizirapi/AdminController/methodkaydet/', this.methodmodel).then();
                    this.iptal();
                    this.islemlerigetir();
                },
                iptal() {
                    this.methodmodel = this.resetmethodmodel;
                },
                async Sil(id) {
                    await axios.get('http://192.168.1.115/hizirapi/AdminController/methodsil/' + id).then();
                    this.islemlerigetir();
                },
                async KategoriKaydet() {
                    await axios.post('http://192.168.1.115/hizirapi/AdminController/kategorikaydet/', this.kategorimodel).then();
                    this.iptal();
                    this.islemlerigetir();
                },
                async KategoriSil(id) {
                    await axios.get('http://192.168.1.115/hizirapi/AdminController/kategorisil/' + id).then();
                    this.islemlerigetir();
                },
                islemlerigetir() {
                    axios.get('http://192.168.1.115/hizirapi/AdminController/methodlistesi/').then(response => (this.methodmodels = response.data));
                    axios.get('http://192.168.1.115/hizirapi/AdminController/kategorilistesi/').then(response => (this.kategorimodels = response.data));

                }
            },
            mounted() {
                this.islemlerigetir();
            }
        })
    </script>
    <!-- include summernote css/js -->
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <style>
        table.scroll {
            border-spacing: 0;
            border: 1px solid black;
        }

        table.scroll tbody,
        table.scroll thead {
            display: block;
        }

        thead tr th {
            height: 30px;
        }

        table.scroll tbody {
            height: 600px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
    <!--
    <script>
        CKEDITOR.replace('summernote');
        CKEDITOR.replace('summernote2');
        CKEDITOR.replace('summernote3');
        CKEDITOR.replace('summernote4');
    </script>
     -->
</body>

</html>