<?php
/**
 * @var $this \MJ\Lib\Output\ErrorMessage
 */
?>
<style>
    body {
        font-family: sans-serif;
    }

    .message {
        margin: auto;
        max-width: 1000px;
        widht: auto;
        border-radius: 10px;
        margin-top: 40px;
    }

    .header {
        background: #dc4c4c;
        color: white;
        border-radius: 10px 10px 0px 0px;
        padding: 10px;
        font-size: 2rem;
    }

    .body {
        padding: 10px;
    }

    .error-message {
        border-color: #c9c9c9;
        border-style: solid;
        border-width: 1px;
    }

    h1 {
        margin: 0;
    }
</style>
<div class="message error-message">
    <div class="header">
        <?= $this->title ?>
    </div>
    <div class="body"><?= $this->message ?></div>
    <div class="body">
        <pre>
            <?php
            print_r($this->callstack);
            ?>
        </pre>
    </div>
</div>