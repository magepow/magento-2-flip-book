<?php

namespace Magepow\Flipbook\Model\Widget\Config;

use Magepow\Flipbook\Model\ResourceModel\Flip\CollectionFactory;

class Flip implements \Magento\Framework\Option\ArrayInterface
{

	protected $scopeConfig;
	protected $conllectionFactory;

	public function __construct(
		// \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
		CollectionFactory $conlectionFactory
	)
	{
		$this->conllectionFactory = $conlectionFactory;
	}

    public function toOptionArray()
    {
		$conllection = $this->conllectionFactory->create()->addFieldToFilter('entity_id',['gteq'=>1]);
		$options =[];
		foreach ($conllection as $item) {
			$options[] = array(
                            'label' => $item->getTitle(),
                            'value' => $item->getId()
				);
		}
        return $options;
    }
 
}