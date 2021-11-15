<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\AxesContract;
use Maartenpaauw\Chartscss\Data\Specifications\DatasetsSpecification;
use Maartenpaauw\Chartscss\Data\Specifications\HasMultiple;
use Maartenpaauw\Chartscss\Specifications\NotSpecification;

class InvertedDatasets implements DatasetsContract
{
    private DatasetsContract $origin;

    public function __construct(DatasetsContract $origin)
    {
        $this->origin = $origin;
    }

    public function axes(): AxesContract
    {
        return $this->origin->axes();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        /** @var NotSpecification<DatasetsContract, DatasetsSpecification> $singleDataset */
        $singleDataset = new NotSpecification((new HasMultiple()));

        if ($singleDataset->isSatisfiedBy($this->origin)) {
            return $this->origin->toArray();
        }

        return array_reduce($this->origin->toArray(), function (array $datasets, DatasetContract $dataset) {
            foreach (array_values($dataset->entries()) as $index => $entry) {
                if (array_key_exists($index, $datasets)) {
                    $datasets[$index] = $datasets[$index]->add($entry);
                } else {
                    $datasets[$index] = new Dataset([$entry]);
                }
            }

            return $datasets;
        }, array_map(fn (DatasetContract $dataset) => new Dataset([], $dataset->label()), $this->origin->toArray()));
    }
}
