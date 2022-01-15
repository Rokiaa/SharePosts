<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?> </h1>


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>All Users</h2>
            <table class="table table-bordered table-hover">
                <thead>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                </thead>
                <tbody>
 
<?php foreach($data['users'] as $user): ?>
    <tr>
        <td><?php echo $user->id; ?></td>
       
        <td> <?php echo $user->name; ?> </td> 
       <td><?php echo $user->email; ?> </td>
    </tr>
    
<?php endforeach; ?>  
                </tbody>
                
            </table>
            
        </div>
    </div>
</div>









<?php // echo APPROOT; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>