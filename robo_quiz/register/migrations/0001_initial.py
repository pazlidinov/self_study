# Generated by Django 3.2 on 2023-07-31 07:08

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Leed_user',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=150)),
                ('phone', models.PositiveIntegerField(default=0, unique=True)),
                ('age', models.PositiveIntegerField(default=10)),
                ('address', models.TextField()),
            ],
        ),
    ]
