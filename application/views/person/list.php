<div class="panel-heading">
    <div class="row">
        <div class="col-sm-6">
            <span class="panel-title-heading">
                <?php echo $this->title; ?>
            </span>
        </div>
        <div class="col-sm-6 text-right">
            <a href="<?= site_url("Person/add"); ?>" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
            <a href="#" class="btn btn-success" id="refresh">
                <i class="fa fa-refresh" aria-hidden="true"></i>
            </a>
            <a href="#" id="deleteFromSubmit" class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover text-center">
            <thead>
                <tr class="th-center">
                    <th><input type="checkbox" id="checkAll" /></th>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <form id="deleteForm" method="post" action="<?= site_url('Person/delete'); ?>">
                    <?php if($records && is_array($records)){ ?>
                        <?php for ($i = 0; $i < count($records); $i++){ ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="checkAll" name="id[]" value="<?= $records[$i]->person_id; ?>" />
                                </td>
                                <td><?= $i + 1 ?></td>
                                <td><?= $records[$i]->person_id; ?></td>
                                <td><?= $records[$i]->person_name; ?></td>
                                <td><?= $records[$i]->person_date; ?></td>
                                <td>
                                    <a href="<?= site_url("Person/update/".$records[$i]->person_id); ?>" class="btn btn-primary">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </form>
            </tbody>
        </table>
    </div>
</div>