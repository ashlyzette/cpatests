<?php
    require 'config/config.php';
    require 'registration.php';
    require 'includes/handlers/Login.php';
?>
<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href = 'assets/css/bootstrap.min.css'></link>
    <link rel='stylesheet' href = 'assets/css/main.css'></link>
    <title> CPA Chronicles</title>
</head>
<body>
    <!-- Load menu -->
    <?php require ("includes/standard/menu.php") ?>
    <div class="container">
        <div class = "row mt-3">
            <div class="d-none d-sm-block col-md-3 col-sm-4 py-md-2 px-3 left_menu">
                <h3>Topics</h3>
                <?php include_once ("includes/standard/topics.php") ?>
            </div>
            <div class="col-md-9 col-sm-8 py-md-2 px-3 mt-5 middle_container">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="components" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Components</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                        <div class = 'd-flex justify-content-end'>
                            <a href= '#' class = "btn btn-primary btn-sm" name = 'read_more'> Login to read more</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="frequently_used_codes" role="tabpanel" aria-labelledby="list-profile-list">
                        <h5>Frequently Used Codes</h5>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, laudantium! Omnis quibusdam animi itaque enim! Quisquam facere libero corrupti blanditiis id earum odio magnam perferendis, expedita, tempora, quidem similique nesciunt pariatur officia adipisci aut laborum harum vitae necessitatibus ea reprehenderit dolorem mollitia magni! Error quos culpa, iusto unde rerum consequuntur. Distinctio tempore similique assumenda officia dolorem quos? Cupiditate aliquid iste mollitia ea harum doloribus illum officiis, libero nesciunt vero autem officia. Nemo inventore placeat corporis libero voluptate harum molestiae molestias id asperiores nesciunt, temporibus totam dolorem nihil quisquam! Voluptatum similique assumenda ex ea modi hic velit quos explicabo veniam blanditiis.
                    </div>
                    <div class="tab-pane fade" id="get_reports_by_account_code" role="tabpanel" aria-labelledby="list-messages-list">
                        <h5>Get Reports by Account Code</h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eaque sit sunt eius obcaecati veniam, iste illum at, nam placeat, aliquam minima doloribus iure! Officia error voluptates omnis voluptatum quibusdam eos ipsam, dolorum earum, laudantium illo perspiciatis nesciunt praesentium in expedita deleniti. Ab ea quasi accusantium, quod atque dolor totam.
                    </div>
                    <div class="tab-pane fade" id="list_of_expenditure_acccount_code" role="tabpanel" aria-labelledby="list-settings-list">
                        <h5>List of Expenditure Account Code</h5>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor natus provident atque. Nostrum, sunt similique porro, earum quisquam atque vero repellendus possimus minus enim non?
                    </div>
                    <div class="tab-pane fade show" id="people" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>People</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                    <div class="tab-pane fade show" id="data" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Data</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                    <div class="tab-pane fade show" id="procedures_and_instructions" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Procedures and Instructions</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                    <div class="tab-pane fade show" id="it_infrastructure" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>IT Infrastructure</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                    <div class="tab-pane fade show" id="software" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Software</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                    <div class="tab-pane fade show" id="internal_controls" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Internal Controls</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div><div class="tab-pane fade show" id="auditing" role="tabpanel" aria-labelledby="list-home-list">
                        <h5>Auditing</h5>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati, impedit quisquam. </p>
                        <p>Fugit, quibusdam iure! Enim odio veniam molestias maiores qui vitae numquam porro magni accusantium molestiae sint quod excepturi neque placeat quae doloribus id est aliquam, voluptates esse omnis soluta! 
                        <p>Quia quidem modi fugiat ex laudantium quo aut officia minus consequuntur molestiae eos temporibus explicabo facilis sequi, in quae nihil alias labore magnam quibusdam eius dolor. Repellendus repellat eaque, corrupti sequi fugiat debitis aut quos!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src = 'assets/js/jquery-3.5.1.min.js'> </script> 
    <script src = 'assets/js/bootstrap.min.js'> </script> 
</body>
</html>