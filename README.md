# Magento2 Module Customer Selector In Ui Component Form

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

```

