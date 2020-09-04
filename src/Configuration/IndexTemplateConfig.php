<?php

namespace FOS\ElasticaBundle\Configuration;

/**
 * Index template configuration class
 *
 * @author Dmitry Balabka <dmitry.balabka@intexsys.lv>
 */
class IndexTemplateConfig implements IndexConfigInterface
{
    /**
     * Constructor expects an array as generated by the Container Configuration builder.
     */
    public function __construct(array $config)
    {
        $this->elasticSearchName = $config['elasticsearch_name'] ?? $config['name'];
        $this->name = $config['name'];
        $this->settings = $config['settings'] ?? [];
        $this->config = $config['config'];
        $this->mapping = $config['mapping'];

        if (!isset($config['template'])) {
            throw new \InvalidArgumentException('Index template value must be set');
        }

        $this->template = $config['template'];
    }

    use IndexConfigTrait;

    /**
     * Index name pattern
     *
     * @var string
     */
    private $template;

    /**
     * Gets index name pattern.
     */
    public function getTemplate(): string
    {
        return $this->template;
    }
}
