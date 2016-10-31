<div class="panel-heading">
    <div class="row">
        <div class="col-sm-6">
            <span class="panel-title-heading">
                <?php echo $this->title; ?>
            </span>
        </div>
    </div>
</div>

<div class="panel-body">
    <div class="table-responsive">
        <form action="<?= site_url('Person/update/'.$this->uri->segment(3)); ?>" method="post">
            <div class="form-group">
                <label class="control-label" for="name">Person Name</label>
                <input 
                    required="true" 
                    type="text" 
                    value="<?= isset($formData['person_name']) ? $formData['person_name']: ''; ?>"
                    name="person_name" 
                    placeholder="Name of person" 
                    class="form-control" i
                    d="name"
                />
            </div>
            <div class="form-group text-right">
                <label class="control-label" for="submit"></label>
                <input type="submit" value="Save" class="btn btn-success" id="submit">
            </div>
        </form>
    </div>
</div>