<?php
$urls = Config::Get('urls');
$legal = Config::Get('legal');
$storage = \Config::Get('storage');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="theme-color" content="#2d3943" />

        <title>mclo.gs - 粘贴、分享并分析您的Minecraft日志</title>

        <base href="/" />

        <link rel="stylesheet" href="vendor/fonts/fonts.css" />
        <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="css/btn.css" />
        <link rel="stylesheet" href="css/mclogs.css?v=071224" />

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

        <meta name="description" content="轻松粘贴您的Minecraft日志以分享和分析。">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

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
    <body>
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
        <div class="row dark title">
            <div class="row-inner">
                <h1 class="title-container">
                    <span class="title-verb">粘贴</span>你的Minecraft日志。
                </h1>
            </div>
        </div>
        <div class="row dark paste">
            <div class="row-inner">
                <div class="paste-box">
                    <div class="paste-header">
                        <div class="paste-header-text">
                            在此粘贴您的日志或<span class="btn btn-small btn-no-margin" id="paste-select-file"><i class="fa fa-file-import"></i> 选择一个文件</span>
                         </div>
                        <div class="paste-save btn btn-green btn-no-margin">
                             <i class="fa fa-save"></i> 保存
                        </div>
                    </div>
                    <div id="dropzone" class="paste-body">
                        <textarea id="paste" autocomplete="off" spellcheck="false" data-max-length="<?=$storage['maxLength']?>" data-max-lines="<?=$storage['maxLines']?>"></textarea>
                    </div>
                    <div class="paste-footer">
                        <div class="paste-save btn btn-green btn-no-margin">
                            <i class="fa fa-save"></i> 保存
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row info" id="info">
            <div class="row-inner">
                <div class="info-item info-blue">
                    <div class="info-icon">
                        <i class="fa fa-clone"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                             粘贴
                        </div>
                        <div class="info-text">
                              轻松地从任何来源粘贴您的Minecraft日志文件。关键信息，例如IP地址，会自动隐藏。
                        </div>
                    </div>
                </div>
                <div class="info-item info-green">
                    <div class="info-icon">
                        <i class="fa fa-share-alt"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                            分享
                        </div>
                        <div class="info-text">
                            使用你的个人短网址来分享你的Minecraft日志，并与他人一起寻找解决方案。
                        </div>
                    </div>
                </div>
                <div class="info-item info-red">
                    <div class="info-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="info-details">
                        <div class="info-title">
                            分析
                        </div>
                        <div class="info-text">
                            通过智能语法高亮和分析，在你的Minecraft日志中找到问题。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dark plugin" id="plugin">
            <div class="row-inner">
                <div class="article left">
                    <div class="article-icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <div class="article-info">
                        <div class="article-title">
                            使用我们的插件。
                        </div>
                        <div class="article-text">
                            通过我们的插件，您可以直接从服务器使用一个简单的命令分享您的Minecraft日志。
                            使用权限与团队成员共享功能，一起解决问题。甚至可以导出旧的服务器日志文件，例如在崩溃后。
                            关键信息如IP地址会自动隐藏，以确保安全性和隐私。
                        </div>
                        <div class="article-buttons">
                            <a href="https://modrinth.com/plugin/mclogs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> modrinth.com
                            </a>
                            <a href="https://hangar.papermc.io/Aternos/mclogs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> hangar.papermc.io
                            </a>
                            <a href="https://dev.bukkit.org/projects/mclogs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> dev.bukkit.org
                            </a>
                            <a href="https://www.spigotmc.org/resources/mclo-gs.47502/" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> spigotmc.org
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-bukkit" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fab fa-github"></i> github.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mod" id="mod">
            <div class="row-inner">
                <div class="article right">
                    <div class="article-icon">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="article-info">
                        <div class="article-title">
                            使用我们的模组。
                        </div>
                        <div class="article-text">
                            我们也有适用于Forge和Fabric的模组，因此您可以将其与您喜欢的模组一起使用。它是完全服务器端的，并且具有与插件相同的功能。
                        </div>
                        <div class="article-buttons">
                            <a href="https://modrinth.com/mod/mclogs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> modrinth.com
                            </a>
                            <a href="https://www.curseforge.com/minecraft/mc-mods/mclo-gs" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-download"></i> curseforge.com
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-forge" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fab fa-github"></i> Forge
                            </a>
                            <a href="https://github.com/aternosorg/mclogs-fabric" target="_blank" class="btn btn-blue btn-no-margin">
                                <i class="fab fa-github"></i> Fabric
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dark api" id="api">
            <div class="row-inner">
                <div class="article left">
                    <div class="article-icon">
                        <i class="fa fa-code"></i>
                    </div>
                    <div class="article-info">
                      <div class="article-title">
                            使用我们的API。
                        </div>
                        <div class="article-text">
                            将<strong>mclo.gs</strong>直接集成到您的服务器面板、托管软件或其他任何地方。这个平台是为高性能自动化构建的，并且可以通过我们的HTTP API轻松集成到任何现有软件中。
                        </div>
                        <div class="article-buttons">
                            <a href="<?=$urls['apiBaseUrl']?>" class="btn btn-blue btn-no-margin">
                                <i class="fa fa-book"></i> API文档
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
            <div class="row-inner">
                版权所有 © 2017-<?=date("Y"); ?> by mclo.gs - 中文翻译所有 8aka Team 由 <a target="_blank" href="https://yizhan.wiki">8aka-Team</a> 提供的服务 |
                <a target="_blank" href="<?=$legal['imprint']?>">法律声明</a> |
                <a target="_blank" href="<?=$legal['privacy']?>">隐私政策</a>
            </div>
        </div>
        <script src="js/mclogs.js?v=130222"></script>
    </body>
</html>
