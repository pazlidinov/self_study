# Generated by Django 4.1.7 on 2023-03-14 04:54

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('main', '0002_remove_product_review'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='product',
            name='views',
        ),
    ]
