<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h2><i class="fa fa-user"></i>  <?= lang("app.email.message.created") ?>
    |&nbsp;
    </h2>
    <a href="/" class="float-right"><?=lang("app.label.back_registration_page")?></a>
</nav>

<div class="row table-responsive mt-2">
    <div class="col-md-10 offset-md-1">
        <table class="table table-bordered table-hover table-striped" id="email-datatable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-right">#</th>
                    <th scope="col"><?= lang("app.label.user") ?></th>
                    <th scope="col"><?= lang("app.label.email") ?></th>
                    <th scope="col"><?= lang("app.label.registered_at") ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script src="<?= base_url() . "/js/email/success.js" ?>"></script>