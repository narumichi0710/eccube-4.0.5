<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @admin/Order/confirmationModal_js.twig */
class __TwigTemplate_09b4eb39bebd8d5bea36ad5117e6f214fe8386ea0f35d943745e39e0b2c126c8 extends \Eccube\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<script>
    \$(function() {
        var updater;
        // モーダルの表示を制御
        \$('#bulkSendMail, .confirmationModal').on('click', function (e) {
            var modal = \$('#sentUpdateModal');
            modal.modal();
            var eventTarget = \$(e.currentTarget);
            var type = eventTarget.data('type');
            switch (type) {
                case 'mail':
                    updater = eventTarget.data('bulk-update') ? new BulkSendMail(modal, eventTarget) : new SimpleSendMail(modal, eventTarget);
                    \$('#notificationMail').attr('type', 'hidden');
                    \$('.notificationMail').hide();
                    \$('#viewEmail').removeClass('collapsed').addClass('collapsed');
                    ;
                    break;
                default:
                case 'status':
                    updater = new SimpleStatusUpdate(modal, eventTarget); // bulk-update is always false
                    \$('#notificationMail').attr('type', 'checkbox');
                    \$('.notificationMail').show();
                    \$('#viewEmail').removeClass('collapsed').addClass('collapsed');
            }
            \$.ajax(updater.getPreviewUrl()).done(function (res) {
                \$('#viewEmail').html(res);
            });
            \$('.modal-title', modal).text(updater.modalTitle);
            \$('.modal-body > p.modal-message', modal).text(updater.modalMessage);
            \$('#bulkChange')
                .attr({
                    'data-bulk-update': eventTarget.data('bulk-update'),
                    'data-type': eventTarget.data('type'),
                    'data-update-status-url': eventTarget.data('update-status-url'),
                    'data-notify-mail-url': eventTarget.data('notify-mail-url'),
                    'data-update-status-id': eventTarget.data('update-status-id')
                })
                .text(updater.modalButton);
        });
        // プログレスバーの表示を制御
        \$('#bulkChange, .progressModal').on('click', function (e) {
            //alert(1119);
            var eventTarget = \$(e.currentTarget);
            var type = eventTarget.data('type');
            var modal = \$('#sentUpdateModal');
            switch (type) {
                case 'mail':
                    updater = eventTarget.data('bulk-update') ? new BulkSendMail(modal, eventTarget) : new SimpleSendMail(modal, eventTarget);
                    break;
                default:
                case 'status':
                    if (eventTarget.data('bulk-update')) {
                        if (\$('#option_bulk_status').val() == '') {
                            alert('対応状況を選択してください');
                            return;
                        }
                        updater = new BulkStatusUpdate(modal, eventTarget);
                        modal.modal();
                    } else {
                        updater = new SimpleStatusUpdate(modal, eventTarget);
                    }
            }
            \$('.modal-title', modal).text(updater.modalTitle);
            \$('.modal-body > p.modal-message', modal).text(\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.bulk_action__in_progress_message"), "html", null, true);
        echo "\");
            \$('button', modal).hide();
            \$('#bulk-options').hide();
            \$('.progress', modal).show();
            updater.totalCount = updater.getTotalCount();
            var progress = new \$.Deferred();
            progress.progress(function () {
                updater.progress(this, progress);
            }).fail(function () {
                updater.fail(this);
            }).always(function () {
                updater.always(this);
            });
            updater.getPromises(progress);
        });

    });

    /*
     * Super class
     */
    function ConfirmationModal(modal) {
        this.modal = modal;
        this.mailCount = 0;
        this.currentCount = 0;
        this.totalCount = 0;
    }
    ConfirmationModal.prototype = {
        modalTitle: \"";
        // line 92
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.to_shipped__confirm_title"), "html", null, true);
        echo "\",
        modalMessage: \"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.to_shipped__confirm_message"), "html", null, true);
        echo "\",
        modalButton: \"";
        // line 94
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.execute"), "html", null, true);
        echo "\",
        getPreviewUrl: function () {
            return null;
        },
        getTotalCount: function () {
            return 1;
        },
        progress: function (result, progress) {
            \$('.progress-bar', this.modal).css('width', (++this.currentCount / this.totalCount * 100) + '%');
            if (result['message']) {
                \$('<li><span class=\"badge badge-warning\">NOTICE</span> </li>')
                    .append(\$('<span></span>').text(result['message']))
                    .appendTo('#bulkErrors');
            }
            if (this.currentCount >= this.totalCount) {
                progress.resolve();
            }
        },
        fail: function (result) {
            \$('<li><span class=\"badge badge-danger\">ERROR</span> </li>')
                .append(\$('<span></span>').text(\"";
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.system_error"), "html", null, true);
        echo "\"))
                .appendTo('#bulkErrors');
        },
        always: function (result) {
            \$('.progress', this.modal).hide();
            \$('.modal-body > p.modal-message', this.modal).text(\"";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.bulk_action__complete_message"), "html", null, true);
        echo "\");
            \$('#bulkChangeComplete').show();
        },
        getPromises: function (progress, url, data) {
            if (data == undefined) {
                data = {'notificationMail': \$('input#notificationMail:checked').val()};
            }
            return \$.ajax({
                'url': url,
                'type': 'PUT',
                'data': data
            })
                .fail(function () {
                    progress.reject();
                    ConfirmationModal.prototype.fail.call(this);
                })
                .always(function (data) {
                    progress.notifyWith(data);
                });
        }
    };
    /*
     * ステータス一括更新
     */
    function BulkStatusUpdate(modal, eventTarget) {
        ConfirmationModal.call(this, modal);
        this.eventTarget = eventTarget;
    }
    // extend super class
    BulkStatusUpdate.prototype = Object.create(ConfirmationModal.prototype, {
        constructor: {
            value: ConfirmationModal
        },
        modalTitle: {
            value: \"";
        // line 153
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.change_status"), "html", null, true);
        echo "\"
        },
        getTotalCount: {
            value: function () {
                return \$('input[data-id]:checked').length;
            }
        },
        getPromises: {
            value: function (progress) {
                return \$('input[data-id]:checked').map(function () {
                    var url = \$(this).data('update-status-url');
                    var data = {'order_status': \$('#option_bulk_status').val()};
                    return ConfirmationModal.prototype.getPromises.call(this, progress, url, data);
                });
            }
        }
    });
    /*
     * ステータス個別更新
     */
    function SimpleStatusUpdate(modal, eventTarget) {
        ConfirmationModal.call(this, modal);
        this.eventTarget = eventTarget;
        this.notifierCompleteMessage = '';
    }
    // extend super class
    SimpleStatusUpdate.prototype = Object.create(ConfirmationModal.prototype, {
        constructor: {
            value: ConfirmationModal
        },
        getPreviewUrl: {
            value: function () {
                return this.eventTarget.data('preview-notify-mail-url');
            }
        },
        progress: {
            value: function (result, progress) {
                if (result.mail) {
                    this.mailCount++;
                    this.notifierCompleteMessage = '";
        // line 192
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.shipping_mail_send__complete_message"), "html", null, true);
        echo "'.replace(/%count%/, this.mailCount);
                }
                ConfirmationModal.prototype.progress.call(this, result, progress);
            }
        },
        always: {
            value: function (result) {
                ConfirmationModal.prototype.always.call(this, result);
                \$('.modal-body > p.modal-message', this.modal).text(\"";
        // line 200
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.bulk_action__complete_message"), "html", null, true);
        echo "\" + this.notifierCompleteMessage);
            }
        },
        getPromises: {
            value: function (progress) {
                var url = this.eventTarget.data('update-status-url');
                var data = {
                    'order_status': this.eventTarget.data('update-status-id'),
                    'notificationMail': \$('input#notificationMail:checked').val()
                };
                return ConfirmationModal.prototype.getPromises.call(this, progress, url, data);
            }
        }
    });
    /*
     * メール一括送信
     */
    function BulkSendMail(modal) {
        SimpleStatusUpdate.call(this, modal);
    }
    // extend BulkUpdate
    BulkSendMail.prototype = Object.create(SimpleStatusUpdate.prototype, {
        constructor: {
            value: SimpleStatusUpdate
        },
        modalTitle: {
            value: \"";
        // line 226
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.shipping_mail_send__confirm_title"), "html", null, true);
        echo "\"
        },
        modalMessage: {
            value: \"";
        // line 229
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.shipping_mail_send__confirm_message"), "html", null, true);
        echo "\"
        },
        modalButton: {
            value: \"";
        // line 232
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.send"), "html", null, true);
        echo "\"
        },
        getPreviewUrl: {
            value: function () {
                return \$('input[data-preview-notify-mail-url]:checked').data('preview-notify-mail-url');
            }
        },
        getTotalCount: {
            value: function () {
                return \$('input[data-preview-notify-mail-url]:checked').length;
            }
        },
        getPromises: {
            value: function (progress) {
                return \$('input[data-notify-mail-url]:checked').map(function () {
                    var url = \$(this).data('notify-mail-url');
                    return ConfirmationModal.prototype.getPromises.call(this, progress, url);
                });
            }
        }
    });
    /*
     * 個別メール送信
     */
    function SimpleSendMail(modal, relatedTarget) {
        SimpleStatusUpdate.call(this, modal, relatedTarget);
    }
    // extends SimpleUpdate
    SimpleSendMail.prototype = Object.create(SimpleStatusUpdate.prototype, {
        constructor: {
            value: SimpleStatusUpdate
        },
        modalTitle: {
            value: \"";
        // line 265
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.shipping_mail_send__confirm_title"), "html", null, true);
        echo "\"
        },
        modalMessage: {
            value: \"";
        // line 268
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.order.shipping_mail_send__confirm_message"), "html", null, true);
        echo "\"
        },
        modalButton: {
            value: \"";
        // line 271
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("admin.common.send"), "html", null, true);
        echo "\"
        },
        getPromises: {
            value: function (progress) {
                var url = this.eventTarget.data('notify-mail-url');
                return ConfirmationModal.prototype.getPromises.call(this, progress, url);
            }
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "@admin/Order/confirmationModal_js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 271,  345 => 268,  339 => 265,  303 => 232,  297 => 229,  291 => 226,  262 => 200,  251 => 192,  209 => 153,  172 => 119,  164 => 114,  141 => 94,  137 => 93,  133 => 92,  102 => 64,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@admin/Order/confirmationModal_js.twig", "/Applications/MAMP/htdocs/eccube-4.0.5/src/Eccube/Resource/template/admin/Order/confirmationModal_js.twig");
    }
}
