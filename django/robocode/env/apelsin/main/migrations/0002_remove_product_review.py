# Generated by Django 4.1.7 on 2023-03-13 12:37

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('main', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='product',
            name='review',
        ),
    ]
