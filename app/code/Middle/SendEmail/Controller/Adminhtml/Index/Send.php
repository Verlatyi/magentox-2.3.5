<?php

namespace Middle\SendEmail\Controller\Adminhtml\Index;

use Exception;
use Magento\Backend\App\Action;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;
use Middle\SendEmail\Validation\CheckField;

class Send extends Action
{
    /**
     * @var CheckField
     */
    private $checkField;

    /**
     * @var TransportBuilder
     */
    protected $transportBuilder;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        Action\Context $context,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        CheckField $checkField
    ) {
        $this->transportBuilder = $transportBuilder;
        $this->storeManager = $storeManager;
        $this->checkField = $checkField;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $someImage = '';
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            $data = $this->getRequest()->getPostValue();

            $email = $data['sample_fieldset']['title'];
            $chooseColor = $data['sample_fieldset']['color'];
            $someDescription = $data['sample_fieldset']['text_data'];
            $someImage = $data['sample_fieldset']['url_image'];

            if($someImage != '') {
                $this->checkField->getImageType($someImage);
            }

            if ($this->checkField->getEmailValidate($email) && $this->checkField->getTextAreaValidate($someDescription)) {
                $receiverInfo = [
                    'name' => 'Roman Verlatyi',
                    'email' => $email,
                    'color' => $chooseColor,
                    'description' => $someDescription,
                    'image' => $someImage
                ];

                $store = $this->storeManager->getStore();

                $templateParams = [
                    'administrator_name' => $receiverInfo['name'],
                    'choosed_color' => $receiverInfo['color'],
                    'some_description' => $receiverInfo['description'],
                    'url_image' => $receiverInfo['image']
                ];
                $transport = $this->transportBuilder->setTemplateIdentifier(
                    'middle_send_email_customer_from_form'
                )->setTemplateOptions(
                    ['area' => 'frontend',  'store' => $store->getId()]
                )->addTo(
                    $receiverInfo['email'],
                    $receiverInfo['name']
                )->setTemplateVars(
                    $templateParams
                )->setFrom(
                    'general'
                )->getTransport();

                $transport->sendMessage();
            }
        } catch (Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }

        return $resultRedirect->setPath('sendemail/*/main');
    }
}
