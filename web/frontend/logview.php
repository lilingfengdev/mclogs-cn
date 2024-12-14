<?php
$urls = Config::Get('urls');
$legal = Config::Get('legal');
$id = new Id(substr($_SERVER['REQUEST_URI'], 1));
$log = new Log($id);
$shouldWrapLogLines = filter_var($_COOKIE["WRAP_LOG_LINES"] ?? "true", FILTER_VALIDATE_BOOLEAN);

$title = "mclo.gs - 粘贴、分享并分析你的Minecraft日志";
$description = "轻松粘贴你的Minecraft日志以分享和分析。";
if (!$log->exists()) {
    $title = "日志未找到 - mclo.gs";
    http_response_code(404);
} else {
    $codexLog = $log->get();
    $analysis = $log->getAnalysis();
    $information = $analysis->getInformation();
    $problems = $analysis->getProblems();
    $title = $codexLog->getTitle() . " [#" . $id->get() . "]";
    $lineNumbers = $log->getLineNumbers();
    $lineString = $lineNumbers === 1 ? "line" : "lines";

    $errorCount = $log->getErrorCount();
    $errorString = $errorCount === 1 ? "error" : "errors";

    $description = $lineNumbers . " " . $lineString;
    if ($errorCount > 0) {
       $description .= " | " . $errorCount . " " . $errorString;
    }

    if (count($problems) > 0) {
        $problemString = "problems";
        if (count($problems) === 1) {
            $problemString = "problem";
        }
        $description .= " | " . count($problems) . " " . $problemString . " automatically detected";
    }
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="robots" content="noindex,nofollow">
        <meta charset="utf-8" />
        <meta name="theme-color" content="#2d3943" />

        <title><?=$title; ?> - mclo.gs</title>

        <base href="/" />

        <link rel="stylesheet" href="vendor/fonts/fonts.css" />
        <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="css/btn.css" />
        <link rel="stylesheet" href="css/mclogs.css?v=071224" />
        <link rel="stylesheet" href="css/log.css?v=071222" />

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

        <meta name="description" content="<?=$description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="mclo.gs" />
        <meta property="og:title" content="<?=$title; ?>" />
        <meta property="og:description" content="<?=$description; ?>" />
        <meta property="og:url" content="<?=$urls['baseUrl'] . "/" . $id->get(); ?>" />

        <script>
            let _paq = window._paq = window._paq || [];
            _paq.push(['disableCookies']);
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
                _paq.push(['setTrackerUrl', '/data']);
                _paq.push(['setSiteId', '5']);
                let d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.async=true; g.src='/data.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
    </head>
    <body class="log-body">
        <header class="row navigation">
            <div class="row-inner">
                <a href="/" class="logo">
                    <img src="img/logo.png" />
                </a>
                <div class="menu">
                    <a class="menu-item" href="/#info">
                        <i class="fa fa-info-circle"></i> 信息
                    </a>
                    <a class="menu-item" href="/#plugin">
                        <i class="fa fa-database"></i> 插件
                    </a>
                    <a class="menu-item" href="/#mod">
                        <i class="fa fa-puzzle-piece"></i> 模组
                    </a>
                    <a class="menu-item" href="/#api">
                        <i class="fa fa-code"></i> API
                    </a>
                    <a class="menu-social btn btn-black btn-notext btn-large btn-no-margin" href="https://github.com/aternosorg/mclogs" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </header>
        <div class="row dark log-row">
            <div class="row-inner<?= $shouldWrapLogLines ? "" : " no-wrap"?>">
                <?php if($log->exists()): ?>
                <div class="log-info">
                    <div class="log-title">
                        <h1><i class="fas fa-file-lines"></i> <?=$codexLog->getTitle(); ?></h1>
                        <div class="log-id">#<?=$id->get(); ?></div>
                    </div>
                    <div class="log-info-actions">
                        <?php if($errorCount): ?>
                        <div class="btn btn-red btn-small btn-no-margin" id="error-toggle">
                            <i class="fa fa-exclamation-circle"></i>
                            <?=$errorCount . " " . $errorString; ?>
                        </div>
                        <?php endif; ?>
                        <div class="btn btn-blue btn-small btn-no-margin" id="down-button">
                            <i class="fa fa-arrow-circle-down"></i>
                            <?=$lineNumbers . " " . $lineString; ?>
                        </div>
                        <a class="btn btn-white btn-small btn-no-margin" id="raw" target="_blank" href="<?=$urls['apiBaseUrl'] . "/1/raw/". $id->get()?>">
                            <i class="fa fa-arrow-up-right-from-square"></i>
                            Raw
                        </a>
                    </div>
                </div>
                <?php if(count($analysis) > 0): ?>
                    <div class="analysis">
                        <div class="analysis-headline"><i class="fa fa-info-circle"></i> Analysis</div>
                        <?php if(count($information) > 0): ?>
                            <div class="information-list">
                                <?php foreach($information as $info): ?>
                                    <div class="information">
                                        <div class="information-label">
                                            <?=$info->getLabel(); ?>:
                                        </div>
                                        <div class="information-value">
                                            <?=$info->getValue(); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(count($problems) > 0): ?>
                            <div class="problem-list">
                                <?php foreach($problems as $problem): ?>
                                    <div class="problem">
                                        <div class="problem">
                                            <div class="problem-header">
                                                <div class="problem-message">
                                                    <i class="fa fa-exclamation-triangle"></i> <?=htmlspecialchars($problem->getMessage()); ?>
                                                </div>
                                                <?php $number = $problem->getEntry()[0]->getNumber(); ?>
                                                <a href="/<?=$id->get() . "#L" . $number; ?>" class="btn btn-blue btn-no-margin btn-small" onclick="updateLineNumber('#L<?=$number; ?>');">
                                                    <span class="hide-mobile"><i class="fa fa-arrow-right"></i> 行 </span>#<?=$number; ?>
                                                </a>
                                            </div>
                                            <div class="problem-body">
                                                <div class="problem-solution-headline">
                                                    解决方案
                                                </div>
                                                <div class="problem-solution-list">
                                                    <?php foreach($problem->getSolutions() as $solution): ?>
                                                        <div class="problem-solution">
                                                            <?=preg_replace("/'([^']+)'/", "'<strong>$1</strong>'", htmlspecialchars($solution->getMessage())); ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="log">
                    <?php
                        $log->renew();
                        echo $log->getPrinter()->print();
                    ?>
                </div>
                <div class="log-bottom">
                    <div class="btn btn-blue btn-small btn-notext" id="up-button">
                        <i class="fa fa-arrow-circle-up"></i>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" id="wrap-checkbox"<?=$shouldWrapLogLines ? " checked" : ""?>/>
                        <label for="wrap-checkbox">包装日志行</label>
                    </div>
                </div>
                <div class="log-notice">
                    此日志将从他们最后一次查看起保存90天.<br />
                    <a href="mailto:<?=$legal['abuseEmail']?>?subject=Report%20mclo.gs/<?=$id->get(); ?>">举报滥用</a>
                </div>
                <?php else: ?>
                <div class="not-found-title">404 - 日志未找到。</div>
                <div class="not-found-text">您尝试打开的日志不存在（或已被删除）。<br />我们自动删除过去90天内未被打开的所有日志。</div>
                <div class="not-found-buttons">
                    <a href="/" class="btn btn-no-margin btn-blue btn-small">
                        <i class="fa fa-home"></i> 粘贴新日志
                    </a>
                   </div>
                </div>`
                <?php endif; ?>
            </div>
        </div>
        <div class="row footer">
            <div class="row-inner">
                版权所有 © 2017-<?=date("Y"); ?> by mclo.gs - 中文翻译所有 8aka Team 由 <a target="_blank" href="https://yizhan.wiki">8aka-Team</a> 提供的服务 |
                <a target="_blank" href="<?=$legal['imprint']?>">法律声明</a> |
                <a target="_blank" href="<?=$legal['privacy']?>">隐私政策</a>
            </div>
        </div>
        <script src="js/logview.js?v=130221"></script>
    </body>
</html>
