<?php
/**
 *
 * @author      Akshmagento Team (support@Akshmagento.com)
 * @copyright   Copyright (c) 2020 Akshmagento (http://www.Akshmagento.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Akshmagento\AkshProgressiveApp\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    ) {
        parent::__construct($context, $registry);
    }

    public function getButtonData()
    {
        $notificationId = $this->getNotificationId();
        $data = [];
        if ($notificationId) {
            $data = [
                'label' => __('Delete Notification'),
                'class' => 'delete',
                'id' => 'notification-edit-delete-button',
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['notification_id' => $this->getNotificationId()]);
    }
}
