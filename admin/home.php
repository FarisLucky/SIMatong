<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-product-hunt fa-5x"></i>
                                </div>
                                <?php
                                    $sql = query("SELECT COUNT(id_produk) AS produk FROM tbl_produk");
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $sql[0]['produk'] ?></div>
                                    <div>Total produk!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?halaman=produk">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <?php
                                    $sumCustomer = query("SELECT COUNT(id_anggota) AS customer FROM tbl_anggota");
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $sumCustomer[0]['customer'] ?></div>
                                    <div>Total Anggota!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?halaman=anggota">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <?php
                                    $getTransaction = query("SELECT COUNT(id_pembelian) AS transaction FROM tbl_pembelian")
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $getTransaction[0]['transaction'] ?></div>
                                    <div>Total Transaction!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <?php
                                    $getArticel = query("SELECT COUNT(id_artikel) AS artikel FROM tbl_artikel");
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $getArticel[0]['artikel'] ?></div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>