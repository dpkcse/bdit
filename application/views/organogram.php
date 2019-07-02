<?php include('partials/header.php'); ?>
<style>
    #chart-container {
        font-family: Arial;
        height: auto;
        border: 2px dashed #aaa;
        border-radius: 5px;
        overflow: auto;
        text-align: center;
    }
</style>

<!-- Container -->
<div id="container">
    
    <!-- Start Header -->
    <div class="hidden-header"></div>
    <header class="clearfix">
        
        <!-- Start Top Bar -->
        <?php include('partials/topbar.php'); ?>
        <!-- End Top Bar -->
        
        <!-- Start Header ( Logo & Naviagtion ) -->
        <?php include('partials/nav.php'); ?>
        <!-- End Header ( Logo & Naviagtion ) -->
        
    </header>
    <!-- End Header -->
    
    <!-- Start Page Banner -->
    <div class="page-banner" style="padding:40px 0; background: url(<?php echo base_url(); ?>Assets/images/main-web2.jpg) center #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Organogram</h2>
                    <p>We Are Professional</p>
                </div>
                <div class="col-md-6">
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->
    
    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="page-content">
            
                
                <div class="row">
                
                    <div class="col-md-12">
                        
                        <!-- Classic Heading -->
                        <h4 class="classic-title"><span>About Company</span></h4>
                        
                        <!-- Some Text -->
                        <p>BITI has been supporting clients nationwide in managing the evolving role of information technology in business. As a strategic business partner, we provide IT Training, Diversified IT solutions and services that support attainment of our clients’ business objectives. Our services and solutions include custom application software development, network infrastructure building, plastic card personalization, and delivery and installation of PCs, Servers, and POS.</p>
                        <p>We combine the best of technologies, processes, strategies, and our extensive industry experience to enable our clients to succeed. BITI designs, implements, and supports end-to-end IT solutions and services. Our goal is to improve performance, maximize IT investments, and, ultimately, create a competitive business advantage for our customers. Our ability to integrate Information Technology services into a flexible, total single-point-of-contact (SPOC) solution is the key element of our success.</p>
                        <p>Partnerships with some of the world’s “best-in-class” corporations provide BITI with unique expertise and experience in providing diversified Information Technology solutions, including Information Technology consulting and systems integration.</p>
                        
                    </div>
                </div>

                <!-- Divider -->
                <div class="hr1" style="margin-bottom:50px;"></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="<?php echo base_url(); ?>/Assets/BITI_Corporate_Profile.pdf" target="_BLANK" class="btn-system btn-large border-btn"><i class="icon-feather"></i> BITI Company Profile</a>
                    </div>
                </div>
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:50px;"></div>
                
                <!-- Classic Heading -->
                <h4 class="classic-title"><span>Our Organogram</span></h4>
                
                <!-- Start Team Members -->
                <div class="row">
                    
                    <!-- Start Memebr 1 -->
                    <div class="col-lg-12">
                        <div id="chart-container"></div>
                    </div>
                    <!-- End Memebr 1 -->
                </div>
                <!-- End Team Members -->
                
                <!-- Divider -->
                <div class="hr1" style="margin-bottom:50px;"></div>
                
                <!-- Start Clients Carousel -->
                <div class="our-clients">
                    
                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Our Happy Clients</span></h4>
                    
                    <div class="clients-carousel custom-carousel touch-carousel" data-appeared-items="5">
                    
                        <?php if(count($clients) > 0){ foreach($clients as $row): ?>
                            <!-- Client -->
                            <div class="client-item item">
                                <a href="#"><img src="<?php echo base_url(); ?>admin/uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>"></a>
                            </div>
                        <?php  endforeach; } ?>
                        
                    </div>
                </div>
                <!-- End Clients Carousel -->
                

            </div>
        </div>
    </div>
    <!-- End content -->
    <!-- Start Footer -->
    <?php include('partials/foot.php'); ?>
    <!-- End Footer -->
    
</div>
<!-- End Container -->
<?php include('partials/footer.php'); ?>
<!-- Css3 Transitions Styles  -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/css/jquery.orgchart.min.css" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery.orgchart.min.js"></script>
<script>
    (function($) {
        $(function() {
        var ds = {
            'name': 'CEO',
            'title': 'A.M. Mohibur Rahman',
            'children': [
                { 
                    'name': 'COO', 
                    'title': 'Abdullah Al Masum' ,
                    'children': [
                        { 
                            'name': 'Department',
                            'children': [
                            { 
                                'name': ' Security System',
                                'children': [
                                    { 
                                        'name': 'Engineer',
                                        'children': [
                                            { 
                                                'name': 'Tecnician'
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Data Processing',
                                'children': [
                                    { 
                                        'name': 'Supervisor',
                                        'children': [
                                            { 
                                                'name': 'Operator'
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Service Support',
                                'children': [
                                    { 
                                        'name': 'Head of Service',
                                        'children': [
                                            { 
                                                'name': 'Executive'
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Contact Centre',
                                'children': [
                                    { 
                                        'name': 'Head of Contact Centre',
                                        'children': [
                                            { 
                                                'name': 'Floor Supervisor',
                                                'children': [
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    },
                                                    { 
                                                        'name': 'Customer Support'
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Software',
                                'children': [
                                    { 
                                        'name': 'Head of Software Solution',
                                        'children': [
                                            { 
                                                'name': 'Developer',
                                                'children': [
                                                    { 
                                                        'name': 'Trainee Engineer'
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Training',
                                'children': [
                                    { 
                                        'name': 'Head of Training',
                                        'children': [
                                            { 
                                                'name': 'Asst. Manager',
                                                'children': [
                                                    { 
                                                        'name': 'Executive Training'
                                                    },
                                                    { 
                                                        'name': 'Executive Training'
                                                    },
                                                    { 
                                                        'name': 'Executive Training'
                                                    },
                                                    { 
                                                        'name': 'Executive Training'
                                                    },
                                                    { 
                                                        'name': 'Executive Training'
                                                    },
                                                    { 
                                                        'name': 'Executive Training'
                                                    }
                                                ]
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'ATHE',
                                'children': [
                                    
                                    { 
                                        'name': 'Cheif Co-ordinator'
                                    },
                                    { 
                                        'name': 'Co-ordinator',
                                        'children': [
                                            { 
                                                'name': 'Executive'
                                            },
                                            { 
                                                'name': 'Instructor'
                                            }
                                        ]
                                    }
                                ]
                            },
                            { 
                                'name': 'Marketing & Corprate Affairs'
                            }
                        ]
                        },
                        { 
                            'name': 'Accounts',
                            'children': [
                                { 
                                    'name': 'Head of Accounts & Admin',
                                    'children': [
                                        { 
                                            'name': 'Executive, Accounts & Admin'
                                        },
                                        { 
                                            'name': 'Executive, Accounts & Admin'
                                        }
                                    ]
                                }
                            ]
                        },
                        { 
                            'name': 'HR & Admin',
                            'children': [
                                { 
                                    'name': 'Head of HR',
                                    'children': [
                                        { 
                                            'name': 'Executive HR'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
            };

            var oc = $('#chart-container').orgchart({
            'data' : ds,
            'nodeContent': 'title'
            });

        });
        })(jQuery);
</script>