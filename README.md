# Magento2 Module Customer Selector In Ui Component Form

## How to get it

- Use Composer
```shell
composer require tony-blog/magento2-customer-selector
```

- Use git

```shell
git clone https://code.aliyun.com/tony.liu/customer-chooser.git
```

## How to use it

- **Multiselect**

```xml
        <field name="customer">
            <argument name="data" xsi:type="array">
                <item name="config" xsi:type="array">
                    <item name="dataType" xsi:type="string">text</item>
                    <item name="label" translate="true" xsi:type="string">Customer</item>
                    <item name="formElement" xsi:type="string">select</item>
                    <item name="source" xsi:type="string">order_information</item>
                    <item name="dataScope" xsi:type="string">customer</item>
                    <item name="elementTmpl" xsi:type="string">Loyalty_PointsMall/form/element/tonyselect</item>
                    <item name="component" xsi:type="string">Loyalty_PointsMall/js/form/element/tonyselect</item>
                    <item name="validation" xsi:type="array">
                        <item name="required-entry" xsi:type="boolean">true</item>
                        <item name="validate-number" xsi:type="boolean">true</item>
                    </item>
                    <item name="tonyselect" xsi:type="array">
                        <item name="maximumSelectionLength" xsi:type="string">1</item>
                        <item name="tags" xsi:type="string">true</item>
                        <item name="ajax" xsi:type="array">
                            <item name="url" xsi:type="string">/admin/loyaltymall/ajax_customer/search</item>
                            <item name="search" xsi:type="string">CustomerSearch</item> <!-- Uses virtual model productsearch -->
                        </item>
                    </item>
                </item>
            </argument>
        </field>
```

- **di.xml**

```xml
    <virtualType name="Loyalty\PointsMall\Model\Virtual\CustomerSearch" type="Loyalty\PointsMall\Model\Customer\Search">
        <arguments>
            <argument name="searchData" xsi:type="array">
                <item name="modelCollectionClass" xsi:type="string">Magento\Customer\Model\ResourceModel\Customer\Collection</item>
                <item name="modelClass" xsi:type="string">Magento\Customer\Model\Customer</item>
                <item name="searchFields" xsi:type="array">
                    <item name="firstname" xsi:type="string">firstname</item>
                    <item name="lastname" xsi:type="string">lastname</item>
                </item>
                <item name="modelType" xsi:type="string">eav</item>
                <item name="modelKey" xsi:type="string">entity_id</item>
                <item name="sortByAttribute" xsi:type="string">name</item>
            </argument>
        </arguments>
    </virtualType>
```
![Alt text](media/customer-seletor-one.png?raw=true "customer seletor")

---

![Alt text](media/customer-seletor-two.png?raw=true "customer seletor")

## More Information, Please Subscribe My Wechat Public Platform Or View My Blog : https://www.abmbio.xin

![Alt text](https://www.abmbio.xin/uploads/onlineUpload/20180117_81914.jpg?raw=true "Tony Wechat")

